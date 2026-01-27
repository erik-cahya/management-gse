<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeGhModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'code_gh';
    protected $guarded = ['code_gh_id'];

    public function uniqueIds()
    {
        return ['code_gh_id'];
    }

    public function setCodeGhIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['code_gh_id'] = strtoupper($value);
        }
    }
}
