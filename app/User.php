<?php

namespace Ventamatic;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Ventamatic\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $last_name
 * @property string $username
 * @property string $phone
 * @property string $cell_phone
 * @property string $address
 * @property string $rfc
 * @property string $locality_id
 * @property string $municipality_id
 * @property string $state_id
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereCellPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereRfc($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereLocalityId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereMunicipalityId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereStateId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\User whereDeletedAt($value)
 */
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
