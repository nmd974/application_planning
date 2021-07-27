<?php

namespace Database\Factories;

use App\Models\UserActivity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = $this->faker->numberBetween($min = 1, $max = 10);
        return [
            'token' => md5($user_id).md5(date("Y-m-d", time())),
            'user_id' => $user_id,
            'activity_id' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }

}
