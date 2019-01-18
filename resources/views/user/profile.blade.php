@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @foreach ($suitcaseDetails as $item)
                    <strong>Naam: {{$item->suitcase->name}}</strong>
                    <strong>Koffer id: {{$item->suitcase->id}}</strong>
                    <strong>Naam: {{$item->Item->name}}</strong>
                    <strong>aantal: {{$item->quantity}}</strong>
                    <strong>totale gewicht: {{$item->item->weightInGrams * $item->quantity}}</strong>
                    <br>
                @endforeach

                    
                                  
                   
            </div>
        </div>
    </div>
</div>
@endsection
