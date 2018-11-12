@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
    
                    @foreach ($items as $item)
                        
                        <h2>Naam: {{$item['item']}}</h2><br>
                        <h2>Gewicht in gram: {{$item['weight']}}</h2><br>
                        <h2>Aantal: {{$item['qty']}}</h2><br>

                    @endforeach
                    
                    <h2>{{$weight}}</h2>
                    @if ($weight >= 0 && $weight < 20000)
                        <h2 style="color:green">between 0 et 20000 weightInGrams</h2>
                    @else 
                        <h2 style="color:red">to heavy for your suitcase/backpack</h2>
                    @endif
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
