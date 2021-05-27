@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-5">
                <div class="title">
                    <p class="fs-4">Edit the car data</p>
                </div>
                <form action="/cars/{{ $car->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form">
                        <input class="form-control mt-3" type="text" name="name" placeholder={{ $car->name }}>
                        <input class="form-control mt-3" type="number" name="founded" placeholder={{ $car->founded }}>
                        <input class="form-control mt-3" type="text" name="description" placeholder='Input description'>
                        <button type="submit" class="btn btn-info mt-4">Update data</button>
                    </div>
                </form>
                <a href="/cars"><button class="btn btn-outline-secondary mt-2">Back</button></a>
            </div>
        </div>
    </div>
@endsection