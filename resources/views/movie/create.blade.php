@extends('layouts.app')

@section('title', 'Add a movie')

@section('content')

    {{ Form::model($movie, ['url' => route('movie.store', ['user_id' => $user->id, 'list_id' => $list_id])]) }}

    <fieldset>
        <legend>Add a new movie</legend>

        <div class="form-group">
            {!! Form::label('title', 'Title:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('title', $value=null, ['class' => 'form-control', 'placeholder' => 'Movie title']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('description', $value=null, ['class' => 'form-control', 'placeholder' => 'Movie description']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status', ['class' => 'col-lg-2 control-label'] )  !!}
            <div class="col-lg-10">
                {!!  Form::select('status', ['1' => 'Finished', '2' => 'Plan to watch'],  1, ['class' => 'form-control' ]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('rating', 'Rating', ['class' => 'col-lg-2 control-label'] )  !!}
            <div class="col-lg-10">
                {!!  Form::select('rating', ['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10], 0, ['class' => 'form-control' ]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

    {{ Form::close() }}

    </fieldset>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection