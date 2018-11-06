@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
    
                    {{-- {{dd($item)}} --}}
                        <h3>{{$item->id}}</h3>
                        <h3>{{$item->name}}</h3>
                        <h3>Gewicht in gram:{{$item->weightInGrams}}</h3>
                        <br>
                            <a href="{{route('item.add',['id'=> $item->id]) }}">Add to suitcase</a>
                        {{-- {{$test}} --}}
                        <br><a href="/categories">Categories</a>
                        <br><a href="/index">Index items</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
