@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }
  tr:nth-child(odd) td{
    background-color: #FFFFFF;
  }
  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
</style>
@section('title', 'index.blade.php')

@section('content')
<table>
    @csrf
  <tr>
    <th>name</th>
    <th>price</th>
    <th>age</th>
    <th>nationality</th>
  </tr>
  @foreach ($products as $product)
  <tr>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->age}}</td>
    <td>{{$product->nationality}}</td>
  </tr>
  @endforeach
</table>
{{ $products->links() }}
@endsection
