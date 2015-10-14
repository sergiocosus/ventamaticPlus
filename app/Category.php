<?php

namespace Ventamatic;

use Illuminate\Database\Eloquent\Model;

/**
 * Ventamatic\Category
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Category whereName($value)
 */
class Category extends Model
{
    public function products(){
        return $this->hasMany('Ventamatic\Product');
    }
}
