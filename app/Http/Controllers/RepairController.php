<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Repair;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function showAndCreate(string $uuid): View
    {
        return view('repair.parts', [
            'car' => Car::findWithRepair($uuid)
        ]);
    }

    public function storeRepair(string $uuid, Request $request)
    {
        $validated = $request->validate([
            'part-name' => 'required|max:255',
            'km' => 'required_without_all:months|digits_between:0,1000000|nullable',
            'months' => 'required_without_all:km|digits_between:0,1000|nullable',
            'is_notified' => 'boolean|nullable',
        ]);

        dump($validated);die;

        //TODO: Check valid user as well
        $car = $car = Car::where('uuid', $uuid)->firstOrFail();
        $repair = new Repair();

        // Assign values from the request
        $repair->name = $request->input('part-name');
        $repair->km_interval = $request->input('km');
        $repair->month_time_interval = $request->input('months');
        $repair->is_notified = $request->has('is_notified') ? true : false;
        $repair->car_id = $car->id;

        // Save the repair record
        $repair->save();

        return redirect('/repair-list/'.$uuid);
    }
}
