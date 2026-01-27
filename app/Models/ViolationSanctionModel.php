<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationSanctionModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_sanctions';
    protected $guarded = ['violation_sanction_id'];

    public function uniqueIds()
    {
        return ['violation_sanction_id'];
    }

    public function setViolationSanctionIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violation_sanction_id'] = strtoupper($value);
        }
    }
}
