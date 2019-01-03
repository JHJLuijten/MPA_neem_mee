@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                    {{-- <form action="{{Action('ItemController@giveName')}}" method="POST">
                        @csrf
                        <h2>Name of suitcase: </h2><input name="name" value="{{$name}}">
                        {{csrf_field()}}
                        <button type="submit">Save name</button>    
                    </form>
                     --}}
                <div class="card-body">
                    <div style="backgroung-color:white;">
                    @if ($items != 0 )
                        @foreach ($items[1] as $item)
                            {{-- {{dd($item)}} --}}
                            <strong>Naam: {{$item['name']}}</strong>
                           
                                @php
                                    $weight = $item['weightInGrams'] * $item['qty'];
                                @endphp
                            {{-- <h2>Gewicht in gram: {{$weight}}</h2><br> --}}
                            @foreach ($items[0] as $item)
                                <strong>Aantal: {{$item['qty']}}</strong><br>
                            @endforeach    
                            <ul>  
                               <li><a href="{{route('suitcase.minusItem', ['id' =>$item['id']])}}">minus 1</a></li>
                                <li><a href="{{route('suitcase.remove', ['id' =>$item   ['id']])}}">remove</a></li>
                            </ul>
                            {{-- {{dd($item)}} --}}
                        @endforeach

                        
                    @else ()
                        <h2>weight = 0</h2>
                    @endif
                    
                    <br><br>
                    <a href="{{route('suitcase.increaseWeight')}}">Bigger backpack</a><br>

                    {{-- <h2>{{$weight}}</h2> --}}
                    
                    {{-- @if ($weight >= 0 && $weight < $maxWeight)
                        <h2 style="color:green">between 0 an 20000 weight in grams</h2>
                    @else 
                        <h2 style="color:red">to heavy for your suitcase/backpack</h2>
                    @endif --}}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
