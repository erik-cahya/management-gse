<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeGseModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kode_gse';
    protected $guarded = ['kode_gse_id'];

    public function uniqueIds()
    {
        return ['kode_gse_id'];
    }
}
