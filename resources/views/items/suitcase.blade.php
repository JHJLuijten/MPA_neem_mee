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
                    @if ($items != 0 )
                        @foreach ($items[1] as $item)
                            {{-- {{dd($item)}} --}}
                            <h2>Naam: {{$item['name']}}</h2><br>
                           
                                @php
                                    $weight = $item['weightInGrams'] * $item['qty'];
                                @endphp
                            <h2>Gewicht in gram: {{$weight}}</h2><br>
                            @foreach ($items[0] as $item)
                                <h2>Aantal: {{$item['qty']}}</h2><br>
                            @endforeach      
  {{--                      <a href="{{route('suitcase.minusItem', ['id' =>$item['item']['id']])}}">minus 1</a><br>
                            <a href="{{route('suitcase.remove', ['id' =>$item['item']['id']])}}">remove</a> --}}
                            
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
@endsection
