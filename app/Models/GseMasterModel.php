<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GseMasterModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'gse_master';
    protected $guarded = ['gse_id'];

    public function uniqueIds()
    {
        return ['gse_id'];
    }

    public function setGseIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['gse_id'] = strtoupper($value);
        }
    }

    public function companies(): BelongsTo
    {
        return $this->BelongsTo(CompanyGseModel::class, 'company_id', 'company_id');
    }

    public function types(): BelongsTo
    {
        return $this->BelongsTo(TypeGseModel::class, 'type_id', 'type_id');
    }

    public function categories(): BelongsTo
    {
        return $this->BelongsTo(CategoryGseModel::class, 'category_id', 'category_id');
    }

    public function fuels(): BelongsTo
    {
        return $this->BelongsTo(FuelTypeModel::class, 'fuel_type', 'fuel_id');
    }

    public function ownerships(): BelongsTo
    {
        return $this->BelongsTo(OwnershipTypeGseModel::class, 'ownership_type', 'ownership_type_id');
    }

    public function codeGH(): BelongsTo
    {
        return $this->BelongsTo(CodeGhModel::class, 'code_gh', 'code_gh_id');
    }

    public function codeGSE(): BelongsTo
    {
        return $this->BelongsTo(CodeGseModel::class, 'code_gse', 'code_gse_id');
    }
}
