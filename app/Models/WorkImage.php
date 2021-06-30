<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    use HasFactory;

    public const REPORTED_SELECT = [
        'not relevant' => 'Not relevant',
        'prohibited'   => 'Prohibited',
        'other'        => 'Other',
    ];

    public const STATUS_SELECT = [
        'under review' => 'Under review',
        'approved'     => 'Approved',
        'discarded'    => 'Discarded',
    ];

    public $table = 'work_images';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'work_id',
        'url',
        'position',
        'status',
        'reported',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
