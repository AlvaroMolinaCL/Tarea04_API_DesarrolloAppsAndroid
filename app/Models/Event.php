<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'image_res_name',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}