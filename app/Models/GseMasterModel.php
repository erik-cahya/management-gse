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

    public function perusahaan(): BelongsTo
    {
        return $this->BelongsTo(PerusahaanModel::class, 'perusahaan_id', 'perusahaan_id');
    }

    public function typePeralatan(): BelongsTo
    {
        return $this->BelongsTo(PeralatanModel::class, 'type_peralatan_gse', 'peralatan_id');
    }

    public function kategori_gse(): BelongsTo
    {
        return $this->BelongsTo(KategoriModel::class, 'kategori', 'kategori_id');
    }

    public function bahanBakar(): BelongsTo
    {
        return $this->BelongsTo(BahanBakarModel::class, 'bahan_bakar', 'bahan_bakar_id');
    }

    public function statusKepemilikan(): BelongsTo
    {
        return $this->BelongsTo(KepemilikanModel::class, 'status_kepemilikan', 'kepemilikan_id');
    }

    public function kodeGH(): BelongsTo
    {
        return $this->BelongsTo(KodeGhModel::class, 'kode_gh', 'kode_gh_id');
    }

    public function kodeGSE(): BelongsTo
    {
        return $this->BelongsTo(KodeGseModel::class, 'kode_gse', 'kode_gse_id');
    }
}
