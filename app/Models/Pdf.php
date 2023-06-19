<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'user_id'];

    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
