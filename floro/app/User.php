<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User_activitie;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'first_name',
        'last_name',
        'address',
        'city',
        'house_number',
        'postal_code',
        'telephone_number',
        'status',
        'password',
        'last_login_at',
        'last_logout_at',
        'login_ip',
        'http_user_agent'
    ];
    public $sortable = ['user_name', 'email', 'first_name', 'last_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates=['deleted_at','last_sign_in_at'];

    public function activities()
    {
        return $this->hasmany(User_activitie::class);
    }
    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }   
    public function logs()
    {
        return $this->hasmany(AuthenticationLogs::class);
    }
}
