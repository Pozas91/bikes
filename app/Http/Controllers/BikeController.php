<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBike;
use App\Model\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = auth()->user()->bikes()->orderBy('branch', 'ASC')->get();

        return view('bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bikes = Bike::all();

        return view('bikes.create', compact('bikes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBike $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBike $request)
    {
        $bikeId = (int) $request->input('bike');

        if(is_integer($bikeId) && $bikeId > 0) {
            $bike = Bike::findOrFail($request->input('bike'));
        } else {
            $bike = new Bike();
            $bike->setAttribute('branch', $request->input('branch'));
            $bike->setAttribute('model', $request->input('model'));
            $bike->setAttribute('engine', $request->input('engine'));
            $bike->save();
        }

        auth()->user()->bikes()->attach($bike);

        return redirect()->route('bikes.show', $bike->getAttribute('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bike = Bike::findOrFail($id);
        $consumptions = $bike->consumptions;

        return view('bikes.show', compact('bike', 'consumptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bike = Bike::findOrFail($id);
        return view('bikes.edit', compact('bike'));
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
        $bike = Bike::findOrFail($id);

        $bike->setAttribute('branch', $request->input('branch'));
        $bike->setAttribute('model', $request->input('model'));
        $bike->setAttribute('engine', $request->input('engine'));
        $bike->update();

        return redirect()->route('bikes.show', $bike->getAttribute('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bike = Bike::findOrFail($id);
        $bike->delete();

        return redirect()->route('bikes.index');
    }
}
