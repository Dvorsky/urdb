@extends('layouts.app')

@section('title', 'Add a List')

@section('content')

    {{ Form::model($list, ['url' => route('post_new_list', ['user_id' => $user->id])]) }}

    <fieldset>
        <legend>Add a new list</legend>

        <div class="form-group">
            {!! Form::label('title', 'List Title:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('title', $value=null, ['class' => 'form-control', 'placeholder' => 'List title']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('type', 'List Type', ['class' => 'col-lg-2 control-label'] )  !!}
            <div class="col-lg-10">
                {!!  Form::select('type', ['1' => 'Movie List'],  $selected=null, ['class' => 'form-control' ]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
    </fieldset>


    {{ Form::close() }}

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