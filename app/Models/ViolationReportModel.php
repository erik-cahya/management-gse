<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ViolationReportModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_reports';
    protected $guarded = ['violation_report_id'];
    protected $primaryKey = 'violation_report_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds()
    {
        return ['violation_report_id'];
    }

    public function setViolationReportIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violation_report_id'] = strtoupper($value);
        }
    }

    public function violator(): BelongsTo
    {
        return $this->belongsTo(
            ViolatorModel::class,
            'violator_id',      // FK di violation_reports
            'violator_id'       // PK di violators
        );
    }

    public function violatorReportDetails(): HasMany
    {
        return $this->hasMany(
            ViolationReportDetailModel::class,
            'violation_report_id',
            'violation_report_id'
        );
    }

    public function violationSanctions(): HasMany
    {
        return $this->hasMany(
            ViolationSanctionModel::class,
            'violation_report_id',
            'violation_report_id'
        );
    }
}
