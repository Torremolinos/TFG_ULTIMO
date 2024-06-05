<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Product
 * 
 * Representa un producto en el sistema.
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $image
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * Obtiene los elementos del producto en las órdenes.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}