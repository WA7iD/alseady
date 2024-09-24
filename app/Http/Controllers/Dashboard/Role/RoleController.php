<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Role\RoleRequest;
use App\Http\Services\Dashboard\Role\RoleService;
use App\Models\Permission;
use App\Models\Role;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:roles-read')->only('index');
        $this->middleware('permission:roles-create')->only('create', 'store');
        $this->middleware('permission:roles-update')->only('edit', 'update');
        $this->middleware('permission:roles-delete')->only('destroy');
    }

    public function index()
    {
        $roles = Role::all();
        return view('dashboard.site.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = $this->buildPermissionForm();
        return view('dashboard.site.roles.create', ['permissions' => $permissions]);
    }


    public function edit($id)
    {
        $role = Role::find($id);
        Gate::authorize('edit-role', $role);
        $permissions = $this->buildPermissionForm();
        return view('dashboard.site.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function buildPermissionForm(): array
    {
        $permissions = Permission::query()->oldest()->pluck('name');
        $build = [];
        foreach ($permissions as $permission) {
            $permission = explode('-', $permission, 2);
            $build[$permission[0]][] = $permission[1];
        }
        return $build;
    }
    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            // $data['is_editable'] = $request->is_editable == 'on';
            $data['is_deletable'] = $request->is_deletable == 'on';
            // $data['has_additional_data'] = $request->has_additional_data == 'on';
            $role = $this->storeRole($data);
            if ($request->has('permissions'))
                $this->attachPermissionsToRole($role, $request['permissions']);
            DB::commit();
            return redirect()->route('roles.index')->with(['success' => __('messages.Role created successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('roles.create')->with(['error' => __('messages.Something went wrong')]);
        }
    }
    private function storeRole($data)
    {
        $data['name'] = strtolower(str_replace(' ', '-', $data['display_name_en']));
        return Role::create($data);
    }

    public function update(RoleRequest $request, $id)
    {
       $role = Role::where('id', $id)->first();
        Gate::authorize('edit-role', $role);
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['is_editable'] = $request->is_editable == 'on';
            $data['is_deletable'] = $request->is_deletable == 'on';
            // $data['has_additional_data'] = $request->has_additional_data == 'on';
            $this->updateRole($data, $id);
            $this->syncPermissions($role, $request['permissions']);
            DB::commit();
            return redirect()->route('roles.index')->with(['success' => __('messages.Role updated successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('roles.create')->with(['error' => __('messages.Something went wrong')]);
        }
    }

    private function updateRole($data, $id)
    {
        $role = Role::find($id);
        $role->update($data);
    }

    private function attachPermissionsToRole($role, $data)
    {
        $role->givePermissions($data);
    }

    private function syncPermissions($role, $data)
    {
        $role->syncPermissions($data);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        Gate::authorize('delete-role', $role);
        $role->delete();
        return redirect()->route('roles.index')->with(['success' => __('messages.Role deleted successfully')]);
    }
}
