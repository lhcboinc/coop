<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'active'   => 'Active - Visible and used in overall rating calculations.',
        'inactive' => 'Inactive - Hidden and not used in overall rating calculations.',
        'flagged'  => 'Flagged - Hidden and not used in overall rating calculations. Sent to admins for review.',
    ];

    public $table = 'feedback';

    protected $dates = [
        'client_wrote_at',
        'worker_wrote_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'work_id',
        'client_id',
        'client_rating',
        'client_feedback',
        'client_wrote_at',
        'hide_client_feedback',
        'worker_id',
        'worker_rating',
        'worker_feedback',
        'worker_wrote_at',
        'hide_worker_feedback',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getClientWroteAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setClientWroteAtAttribute($value)
    {
        $this->attributes['client_wrote_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function getWorkerWroteAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setWorkerWroteAtAttribute($value)
    {
        $this->attributes['worker_wrote_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
