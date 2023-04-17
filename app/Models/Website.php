<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visit;

class Website extends Model
{
    use HasFactory;

    protected $table = 'websites';

    protected $fillable = [
        'hostname',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
