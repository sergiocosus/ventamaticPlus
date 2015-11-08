<?php

namespace Ventamatic;

use Illuminate\Database\Eloquent\Model;

/**
 * Ventamatic\Sale
 *
 * @property integer $id
 * @property integer $branch_id
 * @property integer $user_id
 * @property integer $client_id
 * @property float $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereBranchId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Sale whereDeletedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ventamatic\Product[] $products
 */
class Sale extends Model
{
    public function products()
    {
        return $this->belongsToMany('Ventamatic\Product')
            ->withPivot([
                'id',
                'quantity',
                'price',
            ]);
    }
}
