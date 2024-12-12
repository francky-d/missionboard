<?php

namespace Database\Factories;

use App\Enum\ApplicationStatusEnum;
use App\Enum\UserRoleEnum;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
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
            "mission_id" => Mission::pluck("id")->random(),
            "applicant_id" => $this->faker->randomElement(
                User::where("role", UserRoleEnum::CONSULTANT->value)
                    ->pluck('id')->toArray()
            ),
            "status" => $this->faker->randomElement(ApplicationStatusEnum::allValueAsArray()),
        ];
    }
}
