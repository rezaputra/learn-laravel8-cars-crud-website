@extends('layouts.app')

{{-- looping for check elequent serialization --}}
{{-- @foreach ($cars as $car)
    {{ $car->name }}//select toJson()
    {{ $car['name'] }}//select toArray()
@endforeach --}}

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <div class="title text-center">
                    <h2>Welcome to cars blog</h2>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col">
                <div class="Add ">
                    <a href="cars/create">
                    <button class="btn btn-primary">Add car</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-9 col-sm-10">
                @foreach ($cars as $car)
                    <a href="cars/{{ $car->id }}" style="text-decoration: none; color:#333">
                        <div class="item px-5 py-4 mt-5" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                            <p class="fs-5 fst-italic">Founded in {{ $car->founded }}</p>
                            <p class="fs-3 fw-bold">{{ $car->name }}</p>
                            {{-- <p>{{ $car->description }}</p> --}}
    
                            <div class="actions mt-4 d-inline-flex">
                                <a href="cars/{{ $car->id }}/edit">
                                    <button class="btn btn-outline-info me-2">Edit</button>
                                </a>
                                <form action="cars/{{ $car->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                        <button class="btn btn-outline-warning">Delete</button>                                
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection