<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
   


 public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
   public function show($id)
    {
        $user = User::find($id);
        $miyuposts = $user->miyuposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'miyuposts' => $miyuposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}
    
    
   