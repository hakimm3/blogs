<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'idpost';
    protected $fillable = ['title', 'content', 'date', 'iduser'];


    public function user(){
        return $this->belongsTo(User::class, 'iduser', 'id');
    }
}
