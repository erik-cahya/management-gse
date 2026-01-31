<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ViolationReportDetailModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_reports_details';
    protected $guarded = ['violation_report_detail_id'];
    protected $primaryKey = 'violation_report_detail_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds()
    {
        return ['violation_report_detail_id'];
    }

    public function setViolationReportDetailIdAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['violation_report_detail_id'] = strtoupper($value);
        }
    }

    public function violationReport(): BelongsTo
    {
        return $this->belongsTo(
            ViolationReportModel::class,
            'violation_report_id',
            'violation_report_id'
        );
    }
}
