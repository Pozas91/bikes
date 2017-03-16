<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBike;
use App\Http\Requests\UpdateBike;
use App\Model\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function index()
    {
        return Bike::all();
    }

    public function store(StoreBike $request) {
        if(is_null($request->user())) {
            abort(403);
        }

        $bike = new Bike();
        $bike->setAttribute('branch', $request->input('branch'));
        $bike->setAttribute('model', $request->input('model'));
        $bike->setAttribute('engine', $request->input('engine'));
        $bike->save();

        $request->user()->bikes()->attach($bike);

        return $bike;
    }

    public function show($id)
    {
        $bike = Bike::findOrFail($id);
        return $bike->consumptions;
    }

    public function update(UpdateBike $request, $id)
    {
        if(is_null($request->user())) {
            abort(403);
        }

        $bike = Bike::findOrFail($id);
        $bike->setAttribute('branch', $request->input('branch'));
        $bike->setAttribute('model', $request->input('model'));
        $bike->setAttribute('engine', $request->input('engine'));
        $bike->update();

        $request->user()->bikes()->attach($bike);

        return $bike;
    }

    public function destroy(Request $request, $id)
    {
        $bike = Bike::findOrFail($id);
        $deleted = $bike->delete();

        return response()->json(['deleted' => $deleted]);
    }
}
