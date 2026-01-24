<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolatorModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violators';
    protected $guarded = ['violator_id'];

    public function uniqueIds()
    {
        return ['violator_id'];
    }

    public function setViolatorIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violator_id'] = strtoupper($value);
        }
    }
}
