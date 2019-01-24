@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Opgeslagen koffers:</div>
                @if($suitcaseDetails)
                <div style="margin-left:10%;">
                    @foreach ($suitcaseDetails as $item)
                        <strong>Naam: {{$item->suitcase->name}}</strong><br>
                        <strong>Koffer id: {{$item->suitcase->id}}</strong><br>
                        <strong>Naam: {{$item->Item->name}}</strong><br>
                        <strong>aantal: {{$item->quantity}}</strong><br>
                        <strong>totale gewicht: {{$item->item->weightInGrams * $item->quantity}}</strong>
                        <br>
                    @endforeach
                </div>
                @else
                    <strong>Er zijn nog geen koffers opgeslagen</strong>
                @endif                  
                   
            </div>
        </div>
    </div>
</div>
@endsection
