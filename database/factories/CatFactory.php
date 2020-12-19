<?php

namespace Database\Factories;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(3, true);
        $slug = Str::slug($name);
        $userId = User::inRandomOrder()->first()->id;
        $parent_id = rand(1, 5);

        return [
            'name' => $name,
            'slug' => $slug,
            'parent_id' => $parent_id,
            'description' => $this->faker->paragraph,
            'created_by_user_id' => $userId,
            'updated_by_user_id' => $userId

        ];
    }
}
