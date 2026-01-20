<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeralatanModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'peralatan';
    protected $guarded = ['peralatan_id'];

    public function uniqueIds()
    {
        return ['peralatan_id'];
    }
}
