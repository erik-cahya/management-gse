<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationReportDetailModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_reports_details';
    protected $guarded = ['violation_report_detail_id'];

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
}
