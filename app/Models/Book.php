<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'genre',
        'description',
        'status',
        'user_id'

    ];
    public function container() {
        return $this->belongsTo('App\Models\Book', 'author', 'id');
    }
}