<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'seen'      => 'Seen',
        'accepted'  => 'Accepted',
        'refused'   => 'Refused by client',
        'cancelled' => 'Cancelled by worker',
    ];

    public $table = 'offers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'work_id',
        'worker_id',
        'worker_ip',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
