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
        $gender = ['male', 'female'];
        $g = $this->faker->randomElement($gender);
        return [
            'first_name' => $this->faker->firstName($g),
            'last_name' => $this->faker->lastName,
            'promotion_id' => 1,
            'birthday' => $this->faker->dateTimeThisCentury($max = 'now'),
            'state' => true,
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
