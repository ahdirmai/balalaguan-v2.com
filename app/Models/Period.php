<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'phase_id', 'price', 'stock', 'is_active', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id', 'id');
    }
}
