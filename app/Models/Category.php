<?php

namespace App\Models;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
       
        ];
 public function cars()
{
    return $this->hasMany(Car::class, 'cat_id');
}
}
