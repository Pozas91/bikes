<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsumption;
use App\Model\Consumption;
use Illuminate\Http\Request;
use App\Model\Bike;

class ConsumptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param $bikeId
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $bikeId)
    {
        $bike = Bike::findOrFail($bikeId);

        return view('consumptions.create', compact('bike'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConsumption $request
     * @param $bikeId
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumption $request, $bikeId)
    {
        $bike = Bike::findOrFail($bikeId);
        $user = auth()->user();

        $consumption = new Consumption();
        $consumption->setAttribute('km', $request->input('km'));
        $consumption->setAttribute('liters', $request->input('liters'));
        $consumption->setAttribute('driving_type', $request->input('driving_type'));
        $consumption->setAttribute('passenger', ($request->input('passenger') === 'yes') ? true : false);
        $consumption->setAttribute('bike_id', $bike->getAttribute('id'));
        $consumption->setAttribute('user_id', $user->getAttribute('id'));
        $consumption->save();

        return redirect()->route('bikes.show', $bike->getAttribute('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param $bikeId
     * @param $consumptionId
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $bikeId, $consumptionId)
    {
        $bike = Bike::findOrFail($bikeId);
        $consumption = Consumption::findOrFail($consumptionId);

        return view('consumptions.edit', compact('bike', 'consumption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreConsumption $request
     * @param $bikeId
     * @param $consumptionId
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConsumption $request, $bikeId, $consumptionId)
    {
        $bike = Bike::findOrFail($bikeId);
        $consumption = Consumption::findOrFail($consumptionId);

        $consumption->setAttribute('km', $request->input('km'));
        $consumption->setAttribute('liters', $request->input('liters'));
        $consumption->setAttribute('driving_type', $request->input('driving_type'));
        $consumption->setAttribute('passenger', ($request->input('passenger') === 'yes') ? true : false);
        $consumption->update();

        return redirect()->route('bikes.show', $bike->getAttribute('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $bikeId
     * @param $consumptionId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($bikeId, $consumptionId)
    {
        $bike = Bike::findOrFail($bikeId);
        $consumption = Consumption::findOrFail($consumptionId);

        $consumption->delete();

        return redirect()->route('bikes.show', $bike->getAttribute('id'));
    }
}
