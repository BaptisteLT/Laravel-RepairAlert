<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairDone extends Model
{
    use HasFactory;

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public static function findByCar($uuid)
    {
        return self::with('repair')
        ->join('repairs', 'repairs.id', '=', 'repair_dones.repair_id')
        ->join('cars', 'cars.id', '=', 'repairs.car_id')
        ->where('cars.uuid', '=', $uuid)
        ->orderBy('kilometers', 'desc')
        ->get();
    }
}
