<?php

namespace App\Http\Controllers\Dashboard\Position;

use Exception;
use App\Models\Position;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Position\PositionRequest;

class PositionController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:positions-read')->only('index');
        $this->middleware('permission:positions-create')->only('create', 'store');
        $this->middleware('permission:positions-update')->only('edit', 'update');
        $this->middleware('permission:positions-delete')->only('destroy');
    }
    public function index()
    {
        $positions = Position::paginate(10);
        return view('dashboard.site.positions.index', compact('positions'));
    }

    public function edit(Position $position)
    {
        return view('dashboard.site.positions.edit', compact('position'));
    }

    public function update(PositionRequest $request, Position $position)
    {
        $data =   $request->validated();


        $position->update($data);
        return redirect(route('positions.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.positions.create');
    }

    public function store(PositionRequest $request)
    {
        $data =   $request->validated();


        Position::create($data);
        return redirect(route('positions.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Position $position)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($position->image);
            $position->delete();
            DB::commit();
            return redirect()->route('positions.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('positions.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}


