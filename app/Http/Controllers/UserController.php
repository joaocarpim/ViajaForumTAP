<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function listAllUsers() {
        $users = User::all(); // Busca todos os usuários
        return view('users.listAllUsers', ['users' => $users]); // Retorna a view com os dados dos usuários
    }

    public function listUserById(Request $request, $id) {
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
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
            ]);
    
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('profile_photos', 'public');
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $photoPath,
            ]);
    
            Auth::login($user);
    
            return redirect()->route('listAllUsers');
        }
    }

    // Corrigir o método showProfile para corresponder à rota profile
    public function showProfile($id) {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('listAllUsers')->with('error', 'Usuário não encontrado.');
        }
        return view('users.profile', ['user' => $user]);
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);

        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Atualizar foto, se houver
        if ($request->hasFile('photo')) {
            // Apagar a foto anterior se houver
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo); // Deletar a foto anterior
            }

            // Armazenar nova foto
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $photoPath;
        }

        // Atualizar outros campos
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile', ['id' => $user->id])->with('success', 'Perfil atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $id) {
        $user = User::where('id', $id)->delete();
        return redirect()->route('listAllUsers');
    }

    public function toggleSuspension($userId) {
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
