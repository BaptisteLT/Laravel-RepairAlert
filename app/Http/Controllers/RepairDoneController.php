<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Repair;
use App\Models\RepairDone;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepairDoneController extends Controller
{
    public function showAndCreate(string $uuid): View
    {
        return view('repair-done.parts', [
            'car' => Car::findByUuidWithRepair($uuid), //TODO: repair done
            'repairDones' => RepairDone::findByCar($uuid)
        ]);
    }

    public function storeRepairDone(Request $request, string $uuid): View
    {
        /*Requête cron: 

        SELECT * FROM `repairs` 
        INNER JOIN cars ON repairs.car_id = cars.id 
        LEFT JOIN (SELECT *, max(repair_dones.kilometers) as max_repair_dones_km,  max(repair_dones.date) as max_repair_dones_date FROM repair_dones GROUP BY repair_dones.repair_id) repair_dones ON repair_dones.repair_id = repairs.id 
        GROUP BY repairs.id
        HAVING ((max_repair_dones_km - repairs.km_interval) >= cars.kilometers) 
        OR (DATE_ADD(max_repair_dones_date, INTERVAL repairs.month_time_interval MONTH) < NOW());
        */

        //TODO: penser à remettre alert_email_sent à 0 lorsque l'utilisateur ajoute un nouveau repair_dones sur une entité repairs



        $request->validate([
            'repair_id' => 'required|max:255',
            'kilometers' => 'required|numeric', //Si km est mis, alors months n'est pas obligatoire
            'date_of_replacement' => 'required|date', //Si months est mis, alors km n'est pas obligatoire
        ]);

        $repair = Repair::findByUuid($request->input('repair_id'));

        $repairDone = new RepairDone();
        $repairDone->repair_id = $repair->id;
        $repairDone->date = $request->input('date_of_replacement');
        $repairDone->kilometers = $request->input('kilometers');
        $repairDone->save();

        return view('repair-done.parts', [
            'car' => Car::findByUuidWithRepair($uuid),
            'repairDones' => RepairDone::findByCar($uuid)
        ]);
    }
}
