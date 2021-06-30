<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ENDORSED_SELECT = [
        'good conditions'   => 'Good conditions',
        'interesting work'  => 'Interesting work',
        'great cooperation' => 'Great cooperation',
    ];

    public const STATUS_SELECT = [
        'hidden'    => 'Hidden',
        'visible'   => 'Visible',
        'finished'  => 'Finished',
        'expired'   => 'Expired',
        'cancelled' => 'Cancelled',
        'blocked'   => 'Blocked',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'free'             => 'Free',
        'per hour'         => 'Per hour',
        'per day'          => 'Per day',
        'per week'         => 'Per week',
        'per month'        => 'Per month',
        'per work (fixed)' => 'Per work (fixed)',
        'other'            => 'Other',
    ];

    public const REPORTED_SELECT = [
        'not enough information' => 'Not enough information',
        'irrelevant'             => 'Irrelevant',
        'not appropriate'        => 'Not appropriate',
        'no communication'       => 'No communication',
        'scam'                   => 'Scam',
        'spam'                   => 'Spam',
    ];

    public const GPS_APPROX_SELECT = [
        '0'    => 'Show exact location',
        '100'  => 'Show approximate location in 100 meters radius',
        '250'  => 'Show approximate location in 250 meters radius',
        '500'  => 'Show approximate location in 500 meters radius',
        '1000' => 'Show approximate location in 1 km radius',
    ];

    public $table = 'works';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'gps_lat',
        'gps_long',
        'gps_approx',
        'payment_type',
        'payment_rate',
        'transportation',
        'catering',
        'country',
        'county',
        'city',
        'address',
        'zip',
        'client_id',
        'client_ip',
        'status',
        'impressions',
        'views',
        'endorsed',
        'reported',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function workOffers()
    {
        return $this->hasMany(Offer::class, 'work_id', 'id');
    }

    public function workWorkImages()
    {
        return $this->hasMany(WorkImage::class, 'work_id', 'id');
    }

    public function workFeedback()
    {
        return $this->hasMany(Feedback::class, 'work_id', 'id');
    }

    public function workFavouriteWorks()
    {
        return $this->hasMany(FavouriteWork::class, 'work_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
