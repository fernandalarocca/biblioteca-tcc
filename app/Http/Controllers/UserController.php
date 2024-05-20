<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUserAction;
use App\Actions\User\UpdateUserAction;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 50);
        $users = User::query()->paginate($perpage);
        $usersResource = UserResource::collection($users);
        return view("user.index", compact("usersResource"));
    }

    public function show(User $user)
    {
        $user = UserResource::make($user);
        return view('user.show', compact("user"));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = (new CreateUserAction())->execute($data);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'criou',
            'item' => 'usuário',
        ]);
        return redirect()->route('users.list');
    }

    public function edit(User $user)
    {
        return view('user.update', compact("user"));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user = (new UpdateUserAction())->execute($data, $user);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'editou',
            'item' => 'usuário',
        ]);
        return redirect()->route('users.list');
    }

    public function delete(User $user)
    {
        $user->delete();
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'excluiu',
            'item' => 'usuário',
        ]);
        return redirect()->back();
    }
}
