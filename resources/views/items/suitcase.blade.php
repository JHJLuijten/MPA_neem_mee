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
                    <?php
                    
                        // potential if else for checking the weight
                        if ($weightInGrams >= 0 && $weightInGrams < 20000) {
                            echo 'between 0 et 20000 weightInGrams';
                        } else {
                            echo 'to heavy for your suitcase/backpack';
                        }
                    ?>
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
