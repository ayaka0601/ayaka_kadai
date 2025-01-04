@extends('layouts.default')
<style>
</style>
@section('title', '')

@section('content')
<p>Author</p>
<table>
  <tr>
    <th>NAME</th>
    <th></th>
    <th>NATIONALITY</th>
  </tr>
  <tr>
    <td> {{$item->name}} </td>
    <td> {{$item->price}} </td>
    <td> {{$item->image}} </td>
    <td> {{$item->description}} </td>
  </tr>
</table>
@endsection
