<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountOperation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const OPERATION_SELECT = [
        'verify'     => 'Verify account',
        'deactivate' => 'Deactivate account',
        'delete'     => 'Delete account',
        'request_data' => 'Request data',
    ];

    public $table = 'account_operations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'operation',
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
