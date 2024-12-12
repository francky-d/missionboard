<?php

namespace Database\Factories;

use App\Enum\ConsultantStatusEnum;
use App\Enum\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = $this->faker->randomElement(UserRoleEnum::allValueAsArray());
        $consultant_status  = $this->getConsultantStatus($role);

        return [
            "id" => $this->faker->uuid(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role' => $this->faker->randomElement(UserRoleEnum::allValueAsArray()),
            'consultant_status' => $consultant_status,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function getConsultantStatus(string $role): ?string {
        if ($role === UserRoleEnum::CONSULTANT->value) {
            return $this->faker->randomElement(ConsultantStatusEnum::allValueAsArray());
        }
        return null;
    }
}
