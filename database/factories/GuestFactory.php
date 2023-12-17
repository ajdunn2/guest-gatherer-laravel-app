<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Guest;
use App\Models\GuestStatus;
use App\Models\Invite;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'invite_id' => Invite::factory(),
            'guest_status_id' => GuestStatus::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'custom_reply' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'is_plus_one' => $this->faker->boolean(),
        ];
    }
}
