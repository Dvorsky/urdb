<?php

namespace App\Http\Controllers;

use App\User;
use App\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all user's lists and display them
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get($user_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            $user = User::find($user_id);
        }

        $lists = UserList::where('user_id', $user->id)->get();

        return view('lists')->with(['lists'=>$lists, 'user'=>$user]);
    }


    /**
     * Return page for creating new list for validated user
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_get($user_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }
        return view('new-list')->with(['list' => new UserList(), 'user' => $user ]);
    }

    /**
     * Save new list into database
     *
     * @param $user_id
     * @param Request $request
     */
    public function new_post($user_id, Request $request)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }

        $data = $request->validate([
            'title' => 'required|min:6|max:30',
            'type' => 'required'
        ]);

        $list = new UserList();

        $list->title = $data['title'];
        $list->type = $data['type'];
        $list->user_id = $user->id;

        $list->save();

        return redirect()->route('get_lists', ['user_id' => $user->id]);


    }
}
