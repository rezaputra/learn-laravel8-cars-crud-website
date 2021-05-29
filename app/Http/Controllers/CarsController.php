<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

// join data with headquarters and cars table start from headquarters table
use App\Models\Headquarter;
// join data with product, car_product and cars table start from product table
use App\Models\Product;



class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if convert data to json, that data should decode firstly
        // $cars = Car::all(1)->toJson();
        // $cars = json_decode($cars);

        // $cars = Car::all()->toArray();
        // var_dump($cars);

        // Accessing the data
        // request all input field including _token data
        // $car = $request->all();

        // except method, if want except more data you should use array => except([])
        // $car = $request->except('_token');

        // only method, for using this the way same with except method
        // $car = $request->only(['name', 'founded', 'description']);

        // has method, same with except for using it, but this method will return boolean type
        // $car = $request->has('name');

        // check current path information
        // dd($request->path());

        // check the endpoint
        // if ($request->is('cars')){
        //     dd('the endpoint is /cars');
        // }

        // check the current method was used
        // but you can use method isMethod() instead method() the return values are same
        // if ($request->method('POST')) {
        //     dd('method is post');
        // }

        // show the url
        // dd($request->url())

        // show user ip
        dd($request->ip())
        


        $cars = Car::paginate(4);
         
        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $car = Car::find($id);
        // $car = Car::find($id)->toJson();
        // $car = json_decode($car);

        // this select from cars table
        // $hq = $car->headquarters;
        // dd($hq);

        // this select from headquarters table
        // $hq = Headquarter::find($id);
        // dd($hq);

        // check hasMany data in engine table
        // dd($car->engines);

        // check hasOne data in car_production_date table
        // var_dump($car->productionDate);

        // check pivot table which has been created automatically in many to many relationship
        // var_dump($car->products);

        // select data start from products table in many to many relationship
        // $products = Product::find($id);
        // dd($products->cars);

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $car = Car::find($id)->toJson();
        $car = json_decode($car);

        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::where('id', $id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
