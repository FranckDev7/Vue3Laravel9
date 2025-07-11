<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function orders()
    {
        /**
         * Définit une relation many-to-many entre le produit (Product) et les commandes.
         * Chaque produit peut apparaître dans plusieurs commandes, et chaque commande peut contenir plusieurs produits.
         * Les données supplémentaires sur la relation sont stockées dans la table pivot (order_product),
         * incluant :
         * - total_price : le prix total de ce produit dans une commande donnée
         * - total_quantity : la quantité de ce produit commandée
         */
        return $this->belongsToMany(Order::class)
            ->withPivot('total_price', 'total_quantity');
    }
}
