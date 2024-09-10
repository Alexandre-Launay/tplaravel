<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tel',
        'civilite_id',
    ];

    public function civilite(): BelongsTo
    {
        return $this->belongsTo(Civilite::class);
    }
}
