@extends('layouts.default')
<style>
</style>
@section('title', 'register.blade.php')

@section('content')
<form action="" method="post">
  <table>
  @csrf
    <tr>
      <th>商品名</th>
      <td><input type="text" name="name"></td>
    </tr>
    <tr>
      <th>値段</th>
      <td><input type="text" name="price"></td>
    </tr>
    <tr>
      <th>商品説明</th>
      <td><input type="text" name="description"></td>
    </tr>
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>
@endsection
