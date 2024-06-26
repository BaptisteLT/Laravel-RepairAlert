<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repair extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'uuid',
        'name',
        'km_interval',
        'month_time_interval',
        'is_notified'
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
     * Get the repairDones for the repair.
     */
    public function repairDones(): HasMany
    {
        return $this->hasMany(RepairDone::class);
    }

    /**
     * Trouve une opération
     *
     * @param [type] $uuid
     * @return void
     */
    public static function findByUuid($uuid): Repair
    {
        return self::where('uuid', $uuid)->firstOrFail();
    }
}
