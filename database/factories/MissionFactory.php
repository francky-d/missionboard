<?php

namespace Database\Factories;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => $this->faker->uuid(),
            "title" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "nbr_applications" => $this->faker->randomDigit(),
            "starting_date" => Carbon::now()->addMonths($this->faker->randomDigit())->toDateString(),
            "author_id" =>  $this->faker->randomElement(
                User::where("role", UserRoleEnum::COMMERCIAL->value)
                    ->pluck('id')->toArray()
            ),
        ];
    }
}
