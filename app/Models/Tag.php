<?php

namespace App\Models;

use App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'
    ];

    public function sites(): BelongsToMany
    {
        return $this->belongsToMany(Site::class);
    }
}
