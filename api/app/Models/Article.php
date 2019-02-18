<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = false;
    public function guide(){
        return $this->belongsTo("App\Models\guide","guideId");
    }
    public function comment(){
        return $this->hasMany("App\Models\Comment","article_id")->with("user");
    }
    
}
