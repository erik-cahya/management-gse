<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakarModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'bahan_bakar';
    protected $guarded = ['bahan_bakar_id'];

    public function uniqueIds()
    {
        return ['bahan_bakar_id'];
    }
}
