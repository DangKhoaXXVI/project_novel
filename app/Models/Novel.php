<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;
    public $timestamps =  false;
    protected $fillable = [
        'novelname', 'slog_novelname', 'author', 'summary', 'type_id', 'image', 'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'novel';

    public function typenovel(){
        return $this->belongsTo('App\Models\TypeNovel', 'type_id', 'id');
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter', 'novel_id', 'id');
    }

}
