<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Remplit la base de données avec :
         * - 10 utilisateurs
         * - Chaque utilisateur possède 3 commandes
         * - Chaque commande est liée à 5 produits
         * - Pour chaque produit lié, on génère dynamiquement :
         *     - un prix aléatoire entre 100 et 500
         *     - une quantité aléatoire entre 1 et 3
         *
         * Les données de la table pivot (order_product) sont créées via une fonction de rappel,
         * permettant d’avoir un prix et une quantité uniques pour chaque attachement produit-commande.
         *
         * User::factory() : Laravel instancie automatiquement la factory associée au modèle User
         * Product::factory() : Laravel instancie automatiquement la factory associée au modèle Produit
         * Order::factory() : Laravel instancie automatiquement la factory associée au modèle Order
         */

        // ✅ Création d'un administrateur par défaut
        User::create([
            'name' => 'Franck MUZABA',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('ronaldo7@'),
            'remember_token' => \Str::random(10),
        ]);

        User::factory()
            ->count(10)
            ->has(
                Order::factory()
                    ->count(3)
                    ->hasAttached(
                        Product::factory()->count(5),
                        fn () => [
                            'total_price' => rand(100, 500),
                            'total_quantity' => rand(1, 3)
                        ]
                    )
            )->create();
    }
}
