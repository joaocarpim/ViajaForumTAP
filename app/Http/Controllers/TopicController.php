<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listAllTopics(){
        return view('topics.listAllTopics');
    }
    public function createTopic(){
        return view('topics.createTopic');
    }

    public function listPostById(Request $request,$id) {
        // $user = User::where('id', $id)->first(); //Busca um usuário pelo ID
        // return view('users.profile', ['user' => $user]);
        return view('topics.view_post');
    }

    public function UpdatePost(Request $request, $id) {
        // $user = User::where('id', $id)->first();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // if ($request->password != ''){
        //     $user->password = Hash::make($request->password);
        // }
        // $user->save();
        // return redirect()->route('listUserById', [$user->id])->with('message-sucess', 'Alteração realizada com sucesso');
        return view('topics.view_post');
    }

    public function deletePost(Request $request, $id) {
        // $user = User::where('id', $id)->delete();
        // return redirect()->route('listAllUsers');
        return view('topics.view_post');
    }
}
