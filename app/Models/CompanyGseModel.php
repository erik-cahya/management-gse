<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGseModel extends Model
{

    use HasFactory, HasUlids;

    protected $table = 'company_gse';
    protected $guarded = ['company_id'];

    public function uniqueIds()
    {
        return ['company_id'];
    }

    public function setCompanyIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['company_id'] = strtoupper($value);
        }
    }
}
