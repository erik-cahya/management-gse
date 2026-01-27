<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnershipTypeGseModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'ownership_type_gse';
    protected $guarded = ['ownership_type_id'];

    public function uniqueIds()
    {
        return ['ownership_type_id'];
    }

    public function setOwnershipTypeIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['ownership_type_id'] = strtoupper($value);
        }
    }
}
