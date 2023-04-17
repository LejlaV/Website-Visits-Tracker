<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Website;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';

    protected $fillable = [
        'ip',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
