@extends('layouts.app')
@section('title', 'Listagem dos usuários')

@section('content')
<h1 class="text-2x1 font-semibold leading-tigh py-2"> 
   Listagem dos usuários
   <a href="{{route('users.create')}}" class="bg-blue-900 rounded-full text-white px-4 text-sm">+</a>
</h1>

<form action="{{route('users.index')}}" method="get" class="py-5">
<input type="text" name="search" placeholder="Pesquisar" class="">
<button>Pesquisar</button>
</form>



<ul>
   @foreach($users as $user)
   <li>
      {{$user->name}} - {{$user->email}} 
      | <a href="{{route('users.edit',['id' => $user->id])}}"> editar</a>
      | <a href="{{route('users.show',['id' => $user->id])}}"> Detalhes</a>
   </li>
   @endforeach
</ul>
@endsection

