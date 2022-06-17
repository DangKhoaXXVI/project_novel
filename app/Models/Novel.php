<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $dates = [
      'created_at', 'updated_at'
    ];

    public $timestamps =  false;
    
    protected $fillable = [
        'novelname', 'slug_novelname', 'author', 'summary', 'novel_views','type_id', 'category_id', 'state', 'image', 'status', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'novel';

    public function typenovel(){
        return $this->belongsTo('App\Models\TypeNovel', 'type_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter', 'novel_id', 'id');
    }

    public function belongstomanycategory(){
        return $this->belongsToMany(Category::class, 'incategory','novel_id', 'category_id');
    }

}
