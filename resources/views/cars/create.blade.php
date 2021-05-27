@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-5">
                <div class="title">
                    <p class="fs-4">Please input car data</p>
                </div>
                <form action="/cars" method="POST">
                    @csrf
                    <div class="form">
                        <input class="form-control mt-3" type="text" name="name" placeholder="input car name...">
                        <input class="form-control mt-3" type="number" name="founded" placeholder="founded in...">
                        <input class="form-control mt-3" type="text" name="description" placeholder="input car description...">
                        <button type="submit" class="btn btn-primary mt-4">Add car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection