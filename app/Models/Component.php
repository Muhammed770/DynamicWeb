<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    use HasFactory;

    protected $fillable = [
        'page_id',
        'type',
        'content',
        'order',
    ];
    protected $casts = [
        'content' => 'array',
    ]; 
    public function page() {
        return $this->belongsTo(Page::class);
    }
}
