<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory, HasUuids;
    public $fillable = [
        "id",
        "mission_id",
        "applicant_id",
        "status"
    ];
    public function applicants(): HasMany
    {
        return $this->HasMany(User::class, 'applicant_id');
    }
}
