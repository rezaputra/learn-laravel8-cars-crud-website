@extends('layouts.app')
{{-- {{ $car->headquarters->country }} --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="item px-5 py-4 mt-5 d-flex flex-column align-items-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <p class="fs-3 fw-bold">{{ $car->name }}</p>
                    <p class="fw-bold">{{ $car->headquarters->headquarters }}, {{ $car->headquarters->country }}</p>
                    <p class="fs-5 fst-italic">Founded in {{ $car->founded }}</p>
                    <p>{{ $car->description }}</p>

                    <p>Model:</p>
                    <div class="d-flex flex-row"> 
                        @forelse ($car->carModels as $model)                        
                            <p class="fst-italic me-2">{{ $model['model_name'] }}</p>                        
                        @empty
                            <p>This car has no models</p>
                        @endforelse
                    </div>
                    <a href="/cars" class="d-block mt-2"><button class="btn btn-outline-secondary">Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection