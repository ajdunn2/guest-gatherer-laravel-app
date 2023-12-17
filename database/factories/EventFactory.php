<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'location' => $this->faker->word(),
            'time' => $this->faker->word(),
            'date' => $this->faker->dateTime(),
            'category' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'tags' => '{}',
            'status' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'default_response_deadline' => $this->faker->dateTime(),
            'published' => $this->faker->dateTime(),
        ];
    }
}
