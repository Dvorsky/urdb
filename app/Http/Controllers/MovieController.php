<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function new_get()
    {
        return view('add-movie')->with('movie', new Movie);
    }

    public function new_post(Request $request)
    {
        $input = $request->all();
        $enums = config('enums.movie_status');
        $status = $request->input('status');
        if ($enums[$status]) {
            return $request->all();
        } else {
            return 'nice try';
        }
    }
}
