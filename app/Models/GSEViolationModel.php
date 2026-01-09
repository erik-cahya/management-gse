<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GSEViolationModel extends Model
{
    protected $table = 'gse_violations';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
