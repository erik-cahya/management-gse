<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeGseModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'code_gse';
    protected $guarded = ['code_gse_id'];

    public function uniqueIds()
    {
        return ['code_gse_id'];
    }

    public function setCodeGseIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['code_gse_id'] = strtoupper($value);
        }
    }
}
