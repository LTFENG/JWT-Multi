<?php
namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Contracts\Auth\Authenticatable;


/*
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract; 
*/

class Commercial extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'commercials';
    protected $fillable = [
        'commercial_name', 'commercial_email', 'commercial_password','commercial_telephone','commercial_address','commercial_start_operation_hour','commercial_end_operation_hour',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   protected $hidden = [
        'commercials_password', 'remember_token',
    ];
}

/*
class Commercial extends Model implements AuthenticatableContract, AuthorizableContract,  AuthenticatableUserContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'staffs';
   protected $fillable = [
        'commercial_name', 'commercial_email', 'commercial_password','commercial_telephone','commercial_address','commercial_start_operation_hour','commercial_end_operation_hour',
    ];
    protected $hidden = [
        'commercials_password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey(); // Eloquent model method
    }

    /**
     * @return array
     */
 /*   public function getJWTCustomClaims()
    {
        return [];
    }
}*/