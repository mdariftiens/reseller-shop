<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['admin','manager','delivery-man','customer','subscriber'];

        $boolValue = (bool) rand(0,1);

        return [
            'name' => $this->faker->name,
            'mobile' => $this->faker->unique()->phoneNumber,
            'type' => $types[rand(0,4)],
            'is_account_verified' => $boolValue,
            'enabled' => $boolValue,
        ];
    }
}
