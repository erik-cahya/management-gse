<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kategori';
    protected $guarded = ['kategori_id'];

    public function uniqueIds()
    {
        return ['kategori_id'];
    }
}
