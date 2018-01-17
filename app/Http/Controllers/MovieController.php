<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_get($user_id, $list_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }

        return view('new-movie')->with(['movie' => new Movie, 'user' => $user, 'list_id' => $list_id]);
    }

    public function new_post(Request $request, $user_id, $list_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }
        $input = $request->all();

        $enums = config('enums.movie_status');
        $status = $request->input('status');

        $movie = new Movie();

        $movie->title = $input['title'];
        $movie->description = $input['description'];
        $movie->status = $input['status'];
        $movie->rating = $input['rating'];
        $movie->list_id = $list_id;

        $movie->save();

        return redirect()->route('get_lists', ['user_id' => $user_id]);
    }
}
