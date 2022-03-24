<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use App\Http\Requests\GuitarFormRequest;

class GuitearsController extends Controller
{
    private static function getData(){
        return [
            ['id' => 1, 'name' => 'guitar1', 'brand' => 'fender'],
            ['id' => 2, 'name' => 'guitar2', 'brand' => 'gibson'],
            ['id' => 3, 'name' => 'guitar3', 'brand' => 'ibanez'],
            ['id' => 4, 'name' => 'guitar4', 'brand' => 'fender'],
        ];
    }
    /**
     * "php artisan make:controller nameOfController --resource"
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET

        return view('guitars.index', [
            'guitars' => Guitar::all(),
            'userInput' => '<script>hello, testing strip_tags()</script>'
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuitarFormRequest $request)
    {
       $data = $request->validated();

        Guitar::create($data); // mass assignment
        // POST
        // $guitar = new Guitar();

        // $guitar -> name = $data['guitar-name'];
        // $guitar -> brand = $data['brand'];
        // $guitar -> year_made = $data['year'];

        // $guitar -> save();

        return redirect()->route('guitars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guitar $guitar)  //using the model Guitar as a type int and it will try to find $guitar of the id in databse.
    {
        // GET
        return view('guitars.show', [
            'guitar' => $guitar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    {
        // GET
        return view('guitars.edit', [
            'guitar' => $guitar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuitarFormRequest $request, Guitar $guitar)
    {

        $data = $request->validated();

        $guitar->update($data);

        // $guitar -> name = $data['guitar-name'];
        // $guitar -> brand = $data['brand'];
        // $guitar -> year_made = $data['year'];

        // $guitar -> save();

        return redirect() -> route('guitars.show', $guitar->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE
    }
}
