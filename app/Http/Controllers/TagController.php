<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listAllTags(){
        return view('tags.listAllTags');
    }
    public function createTag(){
        return view('tags.createTag');
    }

    public function listTagById(Request $request,$id) {
        // $user = User::where('id', $id)->first(); //Busca um usuário pelo ID
        // return view('users.profile', ['user' => $user]);
        return view('topics.view_Tag');
    }

    public function UpdateTag(Request $request, $id) {
        // $user = User::where('id', $id)->first();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // if ($request->password != ''){
        //     $user->password = Hash::make($request->password);
        // }
        // $user->save();
        // return redirect()->route('listUserById', [$user->id])->with('message-sucess', 'Alteração realizada com sucesso');
        return view('topics.view_Tag');
    }

    public function deleteTag(Request $request, $id) {
        // $user = User::where('id', $id)->delete();
        // return redirect()->route('listAllUsers');
        return view('topics.view_Tag');
    } 
}
