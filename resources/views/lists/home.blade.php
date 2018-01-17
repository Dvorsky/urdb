@extends('layouts.app')

@section('title', $user->name . "'s Lists")

@section('content')

    <ul>
        <h3>Movie Lists</h3>
        @foreach($lists->where('type', 1)->all() as $list)
            <li>
                <span>{{ $list->title }}</span>
                <ul>
                    @foreach($list->movies()->get() as $movie)
                        <li>
                            <span>{{ $movie->title }}</span>
                            <span>{{ $movie->description }}</span>
                            <span>{{ config('enums.movie_status.' . $movie->status) }}</span>
                            <span>{{ $movie->rating }}</span>
                        </li>
                    @endforeach
                    <li><a href="{{ route('movie.create', ['user_id' => $user->id, 'list_id' => $list->id]) }}">Add new movie</a></li>
                </ul>
            </li>
        @endforeach
    </ul>
    
    <p><a href="{{ route('lists.create', ['user_id' => $user->id]) }}">Add a new list</a></p>

@endsection