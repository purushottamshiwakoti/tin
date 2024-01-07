<?php

namespace App\Data\Models;

use App\Data\Traits\AttachableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, AttachableTrait;

    public static function boot()
    {
        static::saving(function ($model) {
            if (Hash::needsRehash($model->password)) {
                $model->password = Hash::make($model->password);
            };
        });
        parent::boot(); // TODO: Change the autogenerated stub
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function coverImage()
    {
        return $this->morphOne(Attachment::class, 'attachable')->where('media_type', 'cover');
    }
    public function hasSubscribed()
    {
        return null;
    }
}