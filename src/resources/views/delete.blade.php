@extends('layouts.default')
<style>
  
</style>
@section('title', 'delete.blade.php')

@section('content')
<table>
    <tr>
      <th>id</th>
      <td>{{$author->id}}</td>
    </tr>
    <tr>
      <th>name</th>
      <td>{{$author->name}}</td>
    </tr>
    <tr>
      <th>age</th>
      <td>{{$author->age}}</td>
    </tr>
    <tr>
      <th>nationality</th>
      <td>{{$author->nationality}}</td>
    </tr>
    <tr>
      <th></th>
      <td>
        <form action="/delete" method="POST">
            @csrf
            <button>送信</button>
        </form>
    </td>
    </tr>
</table>

@endsection
