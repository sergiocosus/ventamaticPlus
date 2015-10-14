<?php namespace Ventamatic;



use Illuminate\Database\Eloquent\Model;

/**
 * Ventamatic\Branch
 *
 * @property integer $id
 * @property string $name
 * @property string $ticket_name
 * @property string $ticket_head
 * @property string $ticket_foot
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereTicketName($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereTicketHead($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereTicketFoot($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ventamatic\Branch whereDeletedAt($value)
 */
class Branch extends Model
{
    public function products(){
        return $this->belongsToMany('Ventamatic\Product');
    }
}
