<?php

namespace App\Models;

use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'url',
        'notes',
    ];

    public function hostingProvider(): BelongsTo
    {
        return $this->belongsTo(HostingProvider::class);
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'developer_contact_id');
    }

    public function projectManager(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'project_manager_contact_id');
    }

    public function productOwner(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'product_owner_contact_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
