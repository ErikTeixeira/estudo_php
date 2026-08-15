@extends('layouts.app')

@section('title', 'Mostrando usuário')


@section('content')

    <h2>Mostrar usuário</h2>

    <p>
        {{ $user->name }}
    </p>
    <p>
        {{ $user->email }}
    </p>

    {{ dd($user) }}

@endsection