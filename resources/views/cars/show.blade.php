@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="item px-5 py-4 mt-5" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <p class="fs-5 fst-italic">Founded in {{ $car->founded }}</p>
                    <p class="fs-3 fw-bold">{{ $car->name }}</p>
                    <p>{{ $car->description }}</p>
                    <a href="/cars"><button class="btn btn-outline-secondary">Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection