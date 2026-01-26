<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ViolatorModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violators';
    protected $guarded = ['violator_id'];
    protected $primaryKey = 'violator_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds()
    {
        return ['violator_id'];
    }

    public function setViolatorIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violator_id'] = strtoupper($value);
        }
    }

    public function gseData(): BelongsTo
    {
        return $this->BelongsTo(GseMasterModel::class, 'gse_id', 'gse_id');
    }

    public function violationReports(): BelongsTo
    {
        return $this->BelongsTo(
            ViolationReportModel::class,
            'violator_id', // FK di violation_reports
            'violator_id'           // PK di violators
        );
    }
}
