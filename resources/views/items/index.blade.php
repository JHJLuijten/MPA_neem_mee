@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($items)
                        @foreach ($items as $item)
                        
                    
                        
                        <h3><a href="/show/{{$item->id}}">{{$item->name}}</a></h3>
                        <a href="{{route('item.add',['id'=> $item['id']]) }}">Add to suitcase</a>
                    
                        <br>
                        @endforeach
                    @else
                        <h2>Geen items beschikbaar</h2>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection