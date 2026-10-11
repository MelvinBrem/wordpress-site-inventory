<?php

namespace Database\Factories;

use App\Enums\ContactType;
use App\Models\Contact;
use App\Models\HostingProvider;
use App\Models\Site;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hosting_provider_id'           => HostingProvider::factory(),
            'developer_contact_id'          => Contact::factory()->ofType(ContactType::Developer),
            'project_manager_contact_id'    => Contact::factory()->ofType(ContactType::ProjectManager),
            'product_owner_contact_id'      => Contact::factory()->ofType(ContactType::ProductOwner),
            'label'                         => fake()->company(),
            'url'                           => 'https://' . fake()->domainName(),
            'notes'                         => fake()->paragraph(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Site $site) {
            $site->tags()->attach(
                Tag::factory()->count(2)->create()
            );
        });
    }
}
