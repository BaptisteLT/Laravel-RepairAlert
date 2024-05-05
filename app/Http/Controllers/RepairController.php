<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Repair;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepairController extends Controller
{
    public function showAndCreate(string $uuid): View
    {
        return view('repair.parts', [
            'car' => Car::findByUuidWithRepair($uuid)
        ]);
    }

    //TODO: add user here
    public function deleteRepair(string $uuid): JsonResponse
    {
        $repair = Repair::where('uuid', $uuid)->first();
        $repair->delete();

        return response()->json(['message' => 'Success'], 200);
    }

    public function storeRepair(string $uuid, Request $request)
    {
        //Validation que les champs sont corrects
        $request->validate([
            'part-name' => 'required|max:255',
            'km' => 'required_without_all:months|numeric|nullable', //Si km est mis, alors months n'est pas obligatoire
            'months' => 'required_without_all:km|numeric|nullable', //Si months est mis, alors km n'est pas obligatoire
            'is_notified' => 'boolean|nullable',
        ]);

        //TODO: Check valid user as well
        $car = Car::where('uuid', $uuid)->firstOrFail();
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

    //TODO: add user here
    public function switchNotification(string $uuid): JsonResponse
    {
        $repair = Repair::where('uuid', $uuid)->first();
        $repair->is_notified = (int)!$repair->is_notified;

        $repair->save();

        return response()->json(['message' => 'Success'], 200);
    }
    
}
