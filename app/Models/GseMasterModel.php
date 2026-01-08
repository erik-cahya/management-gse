<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GseMasterModel extends Model
{
    protected $table = 'gse_master';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
