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
                            @foreach ($items[0] as $item)
                                <strong>Naam: {{$item['name']}}</strong><br>
                                @foreach ($items[1] as $qty)
                                    @if($item['id'] == $qty['id'])
                                        @php
                                            $weight = $item['weightInGrams'] * $qty['qty'];
                                        @endphp
                                        <span>Gewicht in gram: {{$weight}}</span><br>
                                        <span>Aantal: {{$qty['qty']}}</span><br>
                                    @endif
                                @endforeach
                                <ul>  
                                    <li><a href="{{route('suitcase.minusItem', ['id' =>$item['id']])}}">minus 1</a></li>
                                    <li><a href="{{route('suitcase.remove', ['id' =>$item   ['id']])}}">remove</a></li>
                                    <li><a href="{{route('item.add',['id'=> $item['id']]) }}">Add 1</a></li>
                                </ul>
                            @endforeach  
                            <strong>Totale aantal: {{$details[0]}}</strong>
                            <strong></strong>

                            @if ($details[1] >= 0 && $details[1] <= $details[2])
                            {{-- {{dd($details[2])}} --}}
                            <h2 style="color:green">Totale gewicht: {{$details[1]}} van {{$details[2]}}</h2>
                            <h3 style="color:green">De koffer is nog niet te zwaar</h3>

                        @else 
                            <h2 style="color:red">Totale gewicht: {{$details[1]}} is zwaarder dan {{$details[2]}}</h2>
                            <h3 style="color:red">Koffer is te zwaar (verwijder wat om het lichter te maken)</h3>
                        @endif
                        
                        @else
                            <h2>weight = 0</h2>
                        @endif
                        
                    <br><br>
                    <a href="{{route('suitcase.increaseWeight')}}">Grotere koffer</a><br>    
                    <a href="{{route('suitcase.decreaseWeight')}}">Kleinere koffer</a><br>           
                                {{-- 15 20 25 --}}
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
