<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\HostingProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HostingProvider>
 */
class HostingProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_id'    => Contact::factory(),
            'label'         => fake()->company(),
            'url'           => fake()->domainName(),
        ];
    }
}
