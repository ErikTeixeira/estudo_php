@extends('layouts.app')

@section('title')
    Lista de usuários
@endsection

@section('content')
    <h2>
        {{$greetings}}
    </h2>

    @foreach ($users as $user)
        <p>
            - {{$user->name}}
        </p>
    @endforeach
    
@endsection


