<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeGhModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kode_gh';
    protected $guarded = ['kode_gh_id'];

    public function uniqueIds()
    {
        return ['kode_gh_id'];
    }

    public function setKodeGhIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['kode_gh_id'] = strtoupper($value);
        }
    }
}
