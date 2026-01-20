<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanModel extends Model
{

    use HasFactory, HasUlids;

    protected $table = 'perusahaan';
    protected $guarded = ['perusahaan_id'];

    public function uniqueIds()
    {
        return ['perusahaan_id'];
    }

    public function setPerusahaanIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['perusahaan_id'] = strtoupper($value);
        }
    }
}
