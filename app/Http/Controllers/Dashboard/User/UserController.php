<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\UserRequest;
use App\Http\Services\Dashboard\User\UserService;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected  UserRepositoryInterface $userRepository;
    protected UserService $userService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserService $userService,
    ) {
        $this->middleware('permission:users-read')->only('index', 'show');
        $this->middleware('permission:users-create')->only('create', 'store');
        $this->middleware('permission:users-update')->only('edit','update');
        $this->middleware('permission:users-delete')->only('destroy');
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function index()
    {
     
        $users = $this->userRepository->paginate();
        return view('dashboard.site.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.site.users.create');
    }

    public function store(UserRequest $request)
    {
      return  $this->userService->store($request);
    }

    public function edit($id)
    {
        $user = $this->userRepository->getById($id);
        return view('dashboard.site.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
      return  $this->userService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->userService->destroy($id);
    }
}
