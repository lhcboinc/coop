<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ENDORSED_SELECT = [
        'quick communication'  => 'Quick communication',
        'detailed explanation' => 'Detailed explanation',
        'everything great'     => 'Everything great',
    ];

    public const REPORTED_SELECT = [
        'abusive language'                  => 'Abusive language',
        'threatening'                       => 'Threatening',
        'other inappropriate communication' => 'Other inappropriate communication',
    ];

    public $table = 'messages';

    protected $dates = [
        'sent_at',
        'read_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'offer_id',
        'sender_id',
        'recipient_id',
        'text',
        'sent_at',
        'read_at',
        'endorsed',
        'reported',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function getSentAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setSentAtAttribute($value)
    {
        $this->attributes['sent_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getReadAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setReadAtAttribute($value)
    {
        $this->attributes['read_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
