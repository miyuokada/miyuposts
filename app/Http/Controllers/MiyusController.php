<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiyusController extends Controller
{
   
        public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $miyuposts = $user->feed_miyuposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'miyuposts' => $miyuposts,
            ];
        }
        return view('welcome', $data);
    }
    
    
      public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->miyuposts()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    
     public function destroy($id)
    {
        $miyupost = \App\Miyupost::find($id);

        if (\Auth::id() === $miyupost->user_id) {
            $miyupost->delete();
        }

        return redirect()->back();
    }
    }
    


