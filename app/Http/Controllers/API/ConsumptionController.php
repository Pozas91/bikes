<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsumption;
use App\Http\Requests\UpdateConsumption;
use App\Model\Bike;
use App\Model\Consumption;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{

    public function store(StoreConsumption $request) {
        if(is_null($request->user()) || is_null($bike = $request->user()->bikes()->find($request->route('bike'))->first())) {
            abort(403);
        }

        $consumption = new Consumption();
        $consumption->setAttribute('km', $request->input('km'));
        $consumption->setAttribute('liters', $request->input('liters'));
        $consumption->setAttribute('driving_type', $request->input('driving_type'));
        $consumption->setAttribute('passenger', ($request->input('passenger') === 'yes') ? true : false);
        $consumption->setAttribute('bike_id', $bike->id);
        $consumption->setAttribute('user_id', $request->user()->getAttribute('id'));
        $consumption->save();

        return $consumption;
    }

    public function update(UpdateConsumption $request, $id)
    {
        if(is_null($request->user()) || is_null($bike = $request->user()->bikes()->find($request->route('bike'))->first())) {
            abort(403);
        }

        $consumption = Consumption::findOrFail($id);
        $consumption->setAttribute('km', $request->input('km'));
        $consumption->setAttribute('liters', $request->input('liters'));
        $consumption->setAttribute('driving_type', $request->input('driving_type'));
        $consumption->setAttribute('passenger', ($request->input('passenger') === 'yes') ? true : false);
        $consumption->setAttribute('bike_id', $bike->id);
        $consumption->setAttribute('user_id', $request->user()->getAttribute('id'));
        $consumption->update();

        return $consumption;
    }

    public function destroy(Request $request, $id)
    {
        $consumption = Consumption::findOrFail($id);
        $deleted = $consumption->delete();

        return response()->json(['deleted' => $deleted]);
    }
}
