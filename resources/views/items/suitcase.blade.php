@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
    
                    @foreach ($items as $item)
                        {{$item['qty']}}
                        {{$item['weight']}}
                        {{$item['item']}}

                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
