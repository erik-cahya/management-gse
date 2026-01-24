<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'sanctions';
    protected $guarded = ['sanction_id'];

    public function uniqueIds()
    {
        return ['sanction_id'];
    }

    public function setSanctionsIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['sanction_id'] = strtoupper($value);
        }
    }
}
