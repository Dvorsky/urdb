@extends('layouts.app')

@section('title', $user->name . "'s Lists")

@section('content')

    <ul>
        <h3>Movie Lists</h3>
        @foreach($lists as $list)
            <li>
                <span>{{ $list->list_title }}</span>
                <ul>
                    @foreach($list->movies()->get() as $movie)
                        <li>
                            <span>{{ $movie->title }}</span>
                            <span>{{ $movie->description }}</span>
                            <span>{{ config('enums.movie_status.' . $movie->status) }}</span>
                            <span>{{ $movie->rating }}</span>
                        </li>
                    @endforeach
                    <li><a href="{{ route('get_new_movie', ['user_id' => $user->id, 'list_id' => $list->id]) }}">Add new movie</a></li>
                </ul>
            </li>
        @endforeach
    </ul>
    
    <p><a href="{{ route('get_new_list', ['user_id' => $user->id]) }}">Add a new list</a></p>

@endsection