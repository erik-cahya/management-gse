<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeGseModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'type_gse';
    protected $guarded = ['type_id'];

    public function uniqueIds()
    {
        return ['type_id'];
    }

    public function setTypeIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['type_id'] = strtoupper($value);
        }
    }
}
