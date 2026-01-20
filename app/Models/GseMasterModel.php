<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GseMasterModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'gse_master';
    protected $guarded = ['gse_id'];

    public function uniqueIds()
    {
        return ['gse_id'];
    }

    public function setGseIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['gse_id'] = strtoupper($value);
        }
    }
}
