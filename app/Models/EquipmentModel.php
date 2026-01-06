<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentModel extends Model
{
    protected $table = 'equipment';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
