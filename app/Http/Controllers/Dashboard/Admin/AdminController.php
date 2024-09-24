<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\AdminRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\FileManager;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    use FileManager;
    private Builder|Model|null $role;

    public function __construct()
    {
        $this->middleware('permission:admins-read')->only('index');
        $this->middleware('permission:admins-create')->only('create', 'store');
        $this->middleware('permission:admins-update')->only('edit', 'update');
        $this->middleware('permission:admins-delete')->only('destroy');
        $role = request()->route()->parameter('role');
        $this->role = Role::where('name', $role)->first();
    }

    public function index($role)
    {
        Gate::authorize('access-role', $this->role);
        return view('dashboard.site.admins.index', ['role' => $this->role]);
    }

    public function create($role)
    {
        Gate::authorize('access-role', $this->role);
        return view('dashboard.site.admins.create', ['role' => $this->role]);
    }

    public function store(AdminRequest $request, $role)
    {
        Gate::authorize('access-role', $this->role);
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->image !== null) {
                $data['image'] = $this->handle('image', 'profiles/admins/images');
            }

            $data['is_active'] = $request->is_active == 'on';
            $admin = User::create($data);
            $admin->addRole($role);
            DB::commit();
            return redirect()->route('admins.index', $role)->with(['success' => __('messages.created successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admins.create', $role)->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function edit($role, string $id)
    {
        Gate::authorize('access-role', $this->role);
        $admin = User::find($id);
        return view('dashboard.site.admins.edit', ['role' => $this->role, 'admin' => $admin]);
    }

    public function update(AdminRequest $request, $role, string $id)
    {
        $request->validated();
        Gate::authorize('access-role', $this->role);
        $admin = User::find($id);
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->image !== null) {
                $data['image'] = $this->handle('image', 'profiles/admins/images', $admin->image);
            }
            if ($data['password'] == null) {
                unset($data['password']);
            }
            $data['is_active'] = $request->is_active == 'on';
            $admin->update( $data);
            DB::commit();
            return redirect()->route('admins.index', $role)->with(['success' => __('messages.updated successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('admins.edit', [$role, $id])->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($role, string $id)
    {
        Gate::authorize('access-role', $this->role);
        $admin = User::find($id);
        DB::beginTransaction();
        try {
            $admin->delete($id, ['cv', 'image']);
            DB::commit();
            return redirect()->route('admins.index', $role)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admins.index', $role)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
