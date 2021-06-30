<?php

namespace App\Models;

use \DateTimeInterface;
use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasFactory;

    public const STATUS_SELECT = [
        'active'           => 'Active',
        'limited to post'  => 'Limited to post works',
        'limited to offer' => 'Limited to offer cooperation',
        'blocked'          => 'Blocked',
        'reactivated'      => 'Reactivated',
    ];

    public const GPS_APPROX_SELECT = [
        '0'    => 'Show exact location',
        '100'  => 'Show approximate location in 100 meters radius',
        '250'  => 'Show approximate location in 250 meters radius',
        '500'  => 'Show approximate location in 500 meters radius',
        '1000' => 'Show approximate location in 1 km radius',
    ];

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'verified_at',
        'ready_to_go',
        'latest_activity',
        'confirmed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'verified',
        'verified_at',
        'verification_token',
        'remember_token',
        'first_name',
        'last_name',
        'text',
        'signal',
        'skype',
        'telegram',
        'viber',
        'whatsapp',
        'photo',
        'ready_to_go',
        'latest_activity',
        'rating_as_worker',
        'rating_as_client',
        'gps_lat',
        'gps_long',
        'gps_approx',
        'country',
        'county',
        'city',
        'address',
        'zip',
        'status',
        'impressions',
        'views',
        'note',
        'notify_email',
        'notify_push',
        'notify_sms',
        'confirmed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (auth()->check()) {
                $user->verified = 1;
                $user->verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                $user->save();
            } elseif (!$user->verification_token) {
                $token = Str::random(64);
                $usedToken = User::where('verification_token', $token)->first();

                while ($usedToken) {
                    $token = Str::random(64);
                    $usedToken = User::where('verification_token', $token)->first();
                }

                $user->verification_token = $token;
                $user->save();

                $registrationRole = config('panel.registration_default_role');
                if (!$user->roles()->get()->contains($registrationRole)) {
                    $user->roles()->attach($registrationRole);
                }

                $user->notify(new VerifyUserNotification($user));
            }
        });
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function clientWorks()
    {
        return $this->hasMany(Work::class, 'client_id', 'id');
    }

    public function workerOffers()
    {
        return $this->hasMany(Offer::class, 'worker_id', 'id');
    }

    public function userUserImages()
    {
        return $this->hasMany(UserImage::class, 'user_id', 'id');
    }

    public function clientFeedback()
    {
        return $this->hasMany(Feedback::class, 'client_id', 'id');
    }

    public function workerFeedback()
    {
        return $this->hasMany(Feedback::class, 'worker_id', 'id');
    }

    public function userAccountOperations()
    {
        return $this->hasMany(AccountOperation::class, 'user_id', 'id');
    }

    public function userFavouriteUsers()
    {
        return $this->hasMany(FavouriteUser::class, 'user_id', 'id');
    }

    public function userVerifications()
    {
        return $this->hasMany(Verification::class, 'user_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setVerifiedAtAttribute($value)
    {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getReadyToGoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setReadyToGoAttribute($value)
    {
        $this->attributes['ready_to_go'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getLatestActivityAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLatestActivityAttribute($value)
    {
        $this->attributes['latest_activity'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getConfirmedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setConfirmedAtAttribute($value)
    {
        $this->attributes['confirmed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
