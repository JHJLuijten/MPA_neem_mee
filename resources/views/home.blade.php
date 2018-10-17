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
                    @if(auth::user()) 
                        You are logged in!  <br>
                    @endauth
                        @foreach ($items as $item)
                            {{$item->name}}
                        @endforeach
                        
                        <br><a href="/categories">Categories</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
