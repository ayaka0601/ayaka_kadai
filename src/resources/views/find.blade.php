@extends('layouts.default')

</style>
@section('title', '検索')

@section('content')
<form action="find" method="POST">
@csrf
  <input type="text" name="input" value="{{$input}}">
  <input type="submit" value="検索">
</form>
@if (@isset($item))
<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>nationality</th>
  </tr>
  <tr>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}</td>
    <td>{{$item->image}}</td>
    <td>{{$item->description}}</td>
  </tr>
</table>
@endif
@endsection
