<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Service\UserService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    # servies
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function index(Request $request)
    {
        [$data, $count, $i] = $this->userService->list($request, 10);
        return view('backend.users.index', compact('data', 'count', 'i'));
    }

    public function create(Request $request)
    {
        return view('backend.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        [$status, $message] = $this->userService->store($request);
        return redirect()->route('users.index')->with($status, $message);
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        [$status, $message] = $this->userService->update($request, $user);
        return redirect()->route('users.index')->with($status, $message);
    }

    public function destroy(User $user)
    {
        [$status, $message] = $this->userService->delete($user);
        return redirect()->route('users.index')->with($status, $message);
    }

    public function change_password($id)
    {
        $user = User::findorfail($id);
        return view('backend.users.change_password', compact('user'));
    }

    public function updatePassword(UserUpdatePasswordRequest $request, $id)
    {
        [$status, $message] = $this->userService->updatePassword($request, $id);
        return redirect()->route('users.index')->with($status, $message);
    }
}
