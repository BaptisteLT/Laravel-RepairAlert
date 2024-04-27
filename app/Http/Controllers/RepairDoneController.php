<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Repair;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepairDoneController extends Controller
{
    public function showAndCreate(string $uuid): View
    {
        return view('repair-done.parts', [
            'car' => Car::findWithRepair($uuid) //TODO: repair done
        ]);
    }
}
