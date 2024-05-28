<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUserAction;
use App\Actions\User\UpdateUserAction;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

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

        event(new Registered($user));
        $user->sendEmailVerificationNotification();

        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'Criou',
            'item' => 'Usuário: ' . $user->email,
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
            'method' => 'Editou',
            'item' => 'Usuário: ' . $user->email,
        ]);

        return redirect()->route('users.list');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.edit', $user->id)->with('success', 'Senha atualizada com sucesso.');
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            Log::create([
                'user_email' => Auth::user()->email,
                'method' => 'Excluiu',
                'item' => 'Usuário: ' . $user->email,
            ]);
            return redirect()->back()->with('success', 'Usuário excluído com sucesso.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erro ao excluir o usuário (Exception):', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao excluir o usuário.']);
        }
    }
}
