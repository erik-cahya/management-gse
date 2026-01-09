<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GSEInspectionModel extends Model
{
    protected $table = 'gse_inspections';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
