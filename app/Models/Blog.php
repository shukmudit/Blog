<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    //  use HasFactory;
    public $table = 'blog';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
    ];
}