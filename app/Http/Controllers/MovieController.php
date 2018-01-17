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

    public function create($user_id, $list_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }

        return view('movie.create')->with(['movie' => new Movie, 'user' => $user, 'list_id' => $list_id]);
    }

    public function store(Request $request, $user_id, $list_id)
    {
        if ($user_id == Auth::user()->id) {
            $user = Auth::user();
        } else {
            abort(403, 'Access denied');
        }
        $data = $request->validate([
            'title' => 'required|min:6|max:30',
            'description' => 'max:60',
            'status' => 'required',
            'rating' => 'required'
        ]);

        $enums = config('enums.movie_status');
        $status = $request->input('status');

        $movie = new Movie();

        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->rating = $data['rating'];
        $movie->user_list_id = $list_id;

        $movie->save();

        return redirect()->route('lists', ['user_id' => $user_id]);
    }
}
