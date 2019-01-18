@extends('layouts.app')
  @section('content')
    {{-- <h2>{{$categories->name}}</h2> --}}
    @if (count($items) >0)
      @foreach ($items as $item)
                <h3><a href="/show/{{$item->id}}">{{$item->name}}</a></h3>
                <h3>Gewicht in gram: {{$item->weightInGrams}}</h3>
                <a href="{{route('item.add',['id'=> $item['id']]) }}">Voeg aan koffer toe</a>
                {{-- <a href="{{ route('product.addToCart', ['id' =>$product->id]) }}" class="btn btn-success pull-right" role="button">Add to cart</a> --}}
            <hr>
      @endforeach

    @else
      <h2>Er zijn geen items beschikbaar.</h2>
    @endif
    <a href="{{ url()->previous() }}">Ga terug</a>
  <hr>
@endsection
