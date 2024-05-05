<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
    ];

    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    /**
     * Get the repairs for the car.
     */
    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class)->with(['repairDones' => function(Builder $query){
            $query->orderBy('kilometers', 'desc');
        }]);
    }

    /**
     * Trouve une voiture avec ses réparations associées
     *
     * @param [type] $uuid
     * @return void
     */
    public static function findByUuidWithRepair($uuid)
    {
        return self::with('repairs')->where('uuid', $uuid)->firstOrFail();
    }
}
