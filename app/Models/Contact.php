<?php

namespace App\Models;

use App\Enums\ContactType;

use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email_address',
        'phone_number',
        'address',
        'company_name',
        'types',
    ];

    protected function casts(): array
    {
        return [
            'types' => AsEnumCollection::of(ContactType::class),
        ];
    }

    public function scopeOfType(Builder $query, ContactType ...$types): Builder
    {
        return $query->where(function (Builder $query) use ($types) {
            foreach ($types as $type) {
                $query->orWhereJsonContains('types', $type->value);
            }
        });
    }
}
