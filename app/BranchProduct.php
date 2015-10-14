<?php

namespace Ventamatic;

use Illuminate\Database\Eloquent\Model;

/**
 * Ventamatic\BranchProduct
 *
 * @property integer $branch_id
 * @property integer $product_id
 * @property float $stock
 * @property float $price
 * @property float $last_cost
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\BranchProduct whereBranchId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\BranchProduct whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\BranchProduct whereStock($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\BranchProduct wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\BranchProduct whereLastCost($value)
 */
class BranchProduct extends Model
{
    protected $table = "branch_product";
}
