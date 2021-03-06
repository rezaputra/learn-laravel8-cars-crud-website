@extends('layouts.app')
{{-- {{ $car->headquarters->country }} --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="item px-5 py-4 mt-5 d-flex flex-column align-items-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    @if ($car->image_path === '')
                        <p>no image</p>
                    @else
                        <div class="image" class="mb-5">
                            <img src="{{ asset('images/'.$car->image_path ) }}" alt="image" height="300" width="450">                        
                        </div>                        
                    @endif

                    <p class="fs-3 fw-bold">{{ $car->name }}</p>

                    @if ($car->headquarters !== null)
                        <p class="fw-bold">{{ $car->headquarters->headquarters }}, {{ $car->headquarters->country }}</p>
                    @else
                        <p>data not exist</p>
                    @endif

                    <p class="fs-5 fst-italic">Founded in {{ $car->founded }}</p>
                    <p>{{ $car->description }}</p>


                    <div class="row">
                        <div class="col">
                            <table class="table table-hover">                               
                                <thead>
                                <tr>
                                    <th scope="col">Model</th>
                                    <th scope="col">Engines</th>
                                    <th scope="col">Production Date</th>
                                </tr>
                                </thead>

                                <tbody>                                    
                                    @forelse ($car->carModels as $model)                                    
                                        <tr>
                                            <td>{{ $model->model_name }}</td>
                                            
                                            <td>
                                                @foreach ($car->engines as $engine)
                                                    @if ($model->id == $engine->model_id)
                                                        <p>{{ $engine->engine_name }}</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            
                                            
                                            <td class="text-center">
                                                @if ($car->productionDate !== null)
                                                    <p>{{ date('d-m-y', strtotime($car->productionDate->created_at)) }}</p>
                                                @else
                                                    <p>Date is secret</p>
                                                @endif
                                            </td>                                                
                                            

                                        </tr>
                                    @empty
                                        <p class="fst-italic text-center">This car has no models</p>
                                    @endforelse
                                </tbody>                      
                            </table>

                            <p>
                                Product types:
                                @forelse ($car->products as $product)
                                    {{ $product->name }}
                                @empty
                                    Secret
                                @endforelse
                            </p>
                        </div>
                    </div>

                    <a href="/cars?page{{ $car->page }}" class="d-block mt-2"><button class="btn btn-outline-secondary">Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection