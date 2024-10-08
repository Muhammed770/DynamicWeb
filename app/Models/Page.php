<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'slug',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function components() {
        return $this->hasMany(Component::class);
    }
    
}
