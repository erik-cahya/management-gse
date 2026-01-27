<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGseModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'category_gse';
    protected $guarded = ['category_id'];

    public function uniqueIds()
    {
        return ['category_id'];
    }

    public function setCategoryIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['category_id'] = strtoupper($value);
        }
    }
}
