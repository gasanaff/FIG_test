<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'created_at' => fake()->dateTimeBetween('-1 year'),
            'user_id' => UserFactory::new(),
        ];
    }

}
