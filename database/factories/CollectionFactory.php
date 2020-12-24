<?php

namespace Database\Factories;

use App\Models\Cat;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CollectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(5, true);
        $userId = User::inRandomOrder()->first()->id;

        return [
            'name' => $name,
            'description' => $this->faker->paragraph,
            'created_by_user_id' => $userId,
            'updated_by_user_id' => $userId

        ];
    }
}
