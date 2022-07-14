@extends('layouts.app')
@section('title', 'Editar Usuário ')
@section('content')
<h1> Novo Usuario - {{ $user->name }} </h1>

@include('includes.validations-form')

<form action="{{route('users.update',$user->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('users._partials.form')
</form>
@endsection