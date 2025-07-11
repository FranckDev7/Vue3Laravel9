<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product; // recommandé pour associer clairement le modèle

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Le nom du modèle associé à cette factory.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salePrice = $this->faker->numberBetween(1000, 15000);
        $regularPrice = $this->faker->numberBetween($salePrice + 100, $salePrice + 5000);

        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(6, false),
            'image' => $this->faker->imageUrl(),
            'sale_price' => $salePrice,
            'regular_price' => $regularPrice,
            'active' => $this->faker->boolean(80), // 80% de chances d’être actif
        ];
    }

}
