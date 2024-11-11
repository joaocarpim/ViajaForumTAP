<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers() {

        $users = User::all(); // Busca todos os usuários
        return view('users.listAllUsers', ['users' => $users]); // Retorna a view com os dados dos usuários
    }

    public function listUserById(Request $request,$id) {
        $user = User::where('id', $id)->first(); //Busca um usuário pelo ID
        return view('users.profile', ['user' => $user]);
    }

    
public function register(Request $request) {
    if ($request->isMethod('GET')) {
        return view('users.create');
    } else {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('listAllUsers');
    }
}

    public function UpdateUser(Request $request, $id) {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('listUserById', [$user->id])->with('message-sucess', 'Alteração realizada com sucesso');
    }

    public function deleteUser(Request $request, $id) {
        $user = User::where('id', $id)->delete();
        return redirect()->route('listAllUsers');
    }

    public function toggleSuspension($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->is_suspended = !$user->is_suspended;
            $user->save();

            $status = $user->is_suspended ? 'suspensa' : 'reativada';
            return redirect()->back()->with('success', "Conta do usuário {$user->name} foi {$status} com sucesso!");
        }

        return redirect()->back()->with('error', 'Usuário não encontrado!');
    }
}
