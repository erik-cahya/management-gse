<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepemilikanModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kepemilikan';
    protected $guarded = ['kepemilikan_id'];

    public function uniqueIds()
    {
        return ['kepemilikan_id'];
    }
}
