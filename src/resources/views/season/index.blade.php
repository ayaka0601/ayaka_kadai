@extends('layouts.default')
<style>

</style>
@section('title', 'book.index.blade.php')

@section('content')
<table>
  <tr>
    <th>季節</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->getTitle()}}
    </td>
  </tr>
  @endforeach
</table>
@endsection
