@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
    
                    @if ($items != 0 )
                        @foreach ($items as $item)
                            <h2>Naam: {{$item['item']['name']}}</h2><br>
                            <h2>Gewicht in gram: {{$item['weight']}}</h2><br>
                            <h2>Aantal: {{$item['qty']}}</h2><br>
                            
                            <a href="{{route('suitcase.minusItem', ['id' =>$item['item']['id']])}}">minus 1</a><br>
                            <a href="{{route('suitcase.remove', ['id' =>$item['item']['id']])}}">remove</a>
                            
                            {{-- {{dd($item)}} --}}
                        @endforeach
                    
                    @else ()
                        <h2>weight = 0</h2>
                    @endif
                    
                    
                    {{-- <a href="{{route('suitcase.increaseWeight')}}">Bigger backpack</a><br> --}}

                    <h2>{{$weight}}</h2>
                    
                    @if ($weight >= 0 && $weight < $maxWeight)
                        <h2 style="color:green">between 0 an 20000 weight in grams</h2>
                    @else 
                        <h2 style="color:red">to heavy for your suitcase/backpack</h2>
                    @endif
                    
                    {{-- <a href="{{route('suitcase.upgradeBag')}}">Upgrade size</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
