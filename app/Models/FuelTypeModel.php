<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelTypeModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'fuel_type_gse';
    protected $guarded = ['fuel_id'];

    public function uniqueIds()
    {
        return ['fuel_id'];
    }

    public function setFuelIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['fuel_id'] = strtoupper($value);
        }
    }
}
