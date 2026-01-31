<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCheckupListModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'vehicle_checkup_list';
    protected $guarded = ['checkup_list_id'];
    protected $primaryKey = 'checkup_list_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds()
    {
        return ['checkup_list_id'];
    }

    public function setCheckupListIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['checkup_list_id'] = strtoupper($value);
        }
    }

    public function reports()
    {
        return $this->hasMany(
            VehicleCheckupReportModel::class,
            'vehicle_checkup_id',
            'vehicle_checkup_id'
        );
    }
}
