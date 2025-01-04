@extends('layouts.default')
<style>

</style>
@section('title', 'author.index.blade.php')

@section('content')
<table>
  <tr>
    <th>Product</th>
    <th>Season</th>
  </tr>
@foreach ($items as $item)
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
    <td>
      @if ($item->seasons != null)
      <table width="100%">
        @foreach ($item->seasons as $obj)
        <tr>
          <td>{{ $obj->getTitle() }}</td>
        </tr>
        @endforeach
      </table>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection

