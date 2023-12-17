<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Invite;

class InviteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invite::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(4),
            'custom_message' => $this->faker->word(),
            'tags' => '{}',
            'sent_at' => $this->faker->dateTime(),
            'replied_at' => $this->faker->dateTime(),
            'last_replied_at' => $this->faker->dateTime(),
        ];
    }
}
