<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    $pakistaniProducts = [
        'Dal Chana (1kg)', 'Daal Mash (1kg)', 'Basmati Rice Premium (5kg)', 
        'Tapal Danedar Tea (430g)', 'National Chili Powder (200g)', 'Shan Biryani Masala', 
        'Olper\'s Milk (1 Litre)', 'Sufi Sunflower Oil (5 Litre)', 'Rooh Afza (800ml)',
        'Mitchell\'s Mixed Fruit Jam', 'National Tomato Ketchup', 'Sui Gas Pipe 10ft',
        'Sooper Biscuits Family Pack', 'Rio Biscuits Box', 'National Kasuri Methi'
    ];

    return [
        'name' => $this->faker->randomElement($pakistaniProducts) . ' ' . $this->faker->randomDigitNotNull(),
        'sku' => strtoupper($this->faker->unique()->lexify('PAK-???')),
        'price' => $this->faker->randomElement([180, 250, 340, 450, 850, 1200, 2450]),
        'stock_quantity' => $this->faker->numberBetween(5, 60),
    ];
}
}
