<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeNovel extends Model
{
    use HasFactory;
    public $timestamps =  false;
    protected $fillable = [
        'typename', 'slug_typename', 'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'type';
}
