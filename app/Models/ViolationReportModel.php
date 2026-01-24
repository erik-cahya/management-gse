<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationReportModel extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'violation_reports';
    protected $guarded = ['violation_report_id'];

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
}
