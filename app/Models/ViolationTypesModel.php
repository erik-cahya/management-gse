<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationTypesModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_types';
    protected $guarded = ['violation_type_id'];

    public function uniqueIds()
    {
        return ['violation_type_id'];
    }

    public function setViolationTypeIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violation_type_id'] = strtoupper($value);
        }
    }
}
