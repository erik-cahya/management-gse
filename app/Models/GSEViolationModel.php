<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GSEViolationModel extends Model
{


    use HasFactory, HasUlids;

    protected $table = 'gse_violations';
    protected $guarded = ['violation_id'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds()
    {
        return ['violation_id'];
    }

    public function setGseIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violation_id'] = strtoupper($value);
        }
    }
}
