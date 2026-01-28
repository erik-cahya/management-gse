<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCheckupModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'vehicle_checkup';
    protected $guarded = ['vehicle_checkup_id'];

    public function uniqueIds()
    {
        return ['vehicle_checkup_id'];
    }

    public function setVehicleCheckupIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['vehicle_checkup_id'] = strtoupper($value);
        }
    }
}
