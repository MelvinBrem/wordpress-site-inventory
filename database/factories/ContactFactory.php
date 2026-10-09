<?php

namespace Database\Factories;

use App\Enums\ContactType;
use App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => fake()->name(),
            'email_address' => fake()->email(),
            'phone_number'  => fake()->phoneNumber(),
            'address'       => fake()->address(),
            'company_name'  => fake()->company(),
            'types'         => [fake()->randomElement(ContactType::cases())],
        ];
    }

    public function ofType(ContactType ...$types): static
    {
        return $this->state(fn() => [
            'types' => $types,
        ]);
    }
}
