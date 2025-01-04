@extends('layouts.default')
<style>

</style>
@section('title', 'season')

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<form action="/season/add" method="post">
  <table>
    @csrf
    <tr>
      <th>name</th>
      <td><input type="id" name="author_id"></td>
    </tr>
  </table>
  <button>送信</button>
</form>
@endsection
