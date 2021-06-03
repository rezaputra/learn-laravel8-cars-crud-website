<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

// join data with headquarters and cars table start from headquarters table
use App\Models\Headquarter;
// join data with product, car_product and cars table start from product table
use App\Models\Product;

// use custom rule for validate the data
use App\Rules\Uppercase;

// use custom our own validation
use App\Http\Requests\CreateValidationRequest;


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
        // dd($request->ip())
        

        //make a pagination
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

        // method that we can use on $request->file()
        // guestExtension()
        // getMimeType()
        // asStore()
        // store()
        // method we can use on $request
        // guest Extension()
        // getMimeType()
        // store()
        // asStore()
        // storePublicly()
        // move()
        // getClientOriginalName()
        // getClientMimeType()
        // getClientExtension()
        // getSize()
        // getError()
        // ip()
        // isValid()
        
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5012',
            'name' => 'required|unique:cars',
            'founded' => 'required|min:0|max:2021',
            'description' => 'required'
        ]);
        
        $newImageName = time(). '-' . $request->name . '.' . $request->image->extension();

        $request->image->move('images', $newImageName);
            
        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
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
    public function update(CreateValidationRequest $request, $id)//change default Request validation with your own validation
    {   
        $request->validated();

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
