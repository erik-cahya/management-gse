<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCheckupReportModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'vehicle_checkup_report';
    protected $guarded = ['vehicle_checkup_report_id'];

    public function uniqueIds()
    {
        return ['vehicle_checkup_report_id'];
    }

    public function setVehicleCheckupReportIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['vehicle_checkup_report_id'] = strtoupper($value);
        }
    }
}
