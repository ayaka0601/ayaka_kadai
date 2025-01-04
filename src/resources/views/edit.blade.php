@extends('layouts.default')
<style>

</style>
@section('title', '更新')

@section('content')
<form action="/products/{:productld}/update" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        商品名
      </th>
      <td>
        <input type="text" name="name" value="{{$form->name}}">
      </td>
    </tr>
    <tr>
      <th>
        値段
      </th>
      <td>
        <input type="text" name="price" value="{{$form->price}}">
      </td>
    </tr>
    <tr>
      <th>
        季節
      </th>
      <td>
        <input type="text" name="season" value="{{$form->season}}">
      </td>
    </tr>
    <tr>
      <th>
        商品説明
      </th>
      <td>
        <input type="textarea" name="description" value="{{$form->description}}">
      </td>
    </tr>
    <tr>
      <th>
        商品画像
      </th>
      <td>
        <input type="file" name="image" value="{{$form->image}}">
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </table>
</form>
@endsection
