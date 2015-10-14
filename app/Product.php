<?php namespace Ventamatic;



use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * Ventamatic\Product
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $minimum
 * @property string $unit
 * @property string $bar_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Branch[] $branches
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereMinimum($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereBarCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Product whereDeletedAt($value)
 */
class Product extends Model
{

    use SearchableTrait;

    protected $fillable = [
        'name',
        'category_id',
        'minimum',
        'unit',
        'bar_code',
        'description',
    ];

    protected $searchable = [
        'columns' => [
            'name' => 10,
        ],
    ];

    public function category(){
        return $this->belongsTo('Ventamatic\Category');
    }

    public function branches(){
        return $this->belongsToMany('Ventamatic\Branch')->withPivot('stock', 'price');
    }
}
