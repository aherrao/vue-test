<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\Profiles\Profile;
use App\Scopes\ClientScope;
use App\Observers\BaseModelObserve;

class User extends Authenticatable
{
    use Notifiable, UserRepository, UserRelationship;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function saveUser($objRequest, $intId = 0) {

        $objUser = self::with('profile')->find($intId) ?? new self();

        $objUser->name = $objRequest->name;
        $objUser->email = $objRequest->email;
        $objUser->is_admin = ($objRequest->is_admin) ? true : false;
        $objUser->password = Hash::make($objRequest->password);

        if($objUser->profile) {
            $objProfile = $objUser->profile;
        } else {
            $objProfile = new Profile();
            $objProfile = $objProfile->saveProfile($objRequest);
        }

        $objUser->profile_id = $objProfile->id;
        $objUser->client_id = $objProfile->client_id;

        $objUser->save();

        return $objUser;
    }
}
