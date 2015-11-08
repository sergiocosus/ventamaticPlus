<?php

namespace Ventamatic;

use Illuminate\Database\Eloquent\Model;

/**
 * Ventamatic\UserSession
 *
 * @property integer $id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\UserSession whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\UserSession whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\UserSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\UserSession whereUpdatedAt($value)
 */
class UserSession extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public static function registerLogin(User $user)
    {
        return self::create(['user_id' => $user->id]);
    }

    public static function registerLogout(User $user){
        return self::orderBy('created_at','desc')->whereUserId($user->id)->limit(1)->update([]);;
    }
}
