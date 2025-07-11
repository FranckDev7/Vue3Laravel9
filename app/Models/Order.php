<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        /**
         * Définit une relation many-to-many entre la commande (Order) et les produits.
         * Chaque commande peut contenir plusieurs produits, et chaque produit peut appartenir à plusieurs commandes.
         * Les informations supplémentaires sur la relation sont stockées dans la table pivot (order_product),
         * incluant :
         * - total_price : le prix total pour ce produit dans la commande
         * - total_quantity : la quantité commandée de ce produit
         */

        return $this->belongsToMany(Product::class)
            ->withPivot('total_price', 'total_quantity');
    }
}

