<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
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

    public $table = 'user_images';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'url',
        'status',
        'reported',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
