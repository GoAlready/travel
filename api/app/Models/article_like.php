<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article_like extends Model
{
    protected $table = 'article_like';
    public $timestamps = false;
    public static  function hasLike($req){
        return article_like::where("user_id",$req->jwt->id)
        ->where("article_id",$_GET['id'])
        ->where("is_like",1)
        ->first();
    }
    public static  function hasDisLike($req){
        return article_like::where("user_id",$req->jwt->id)
        ->where("article_id",$_GET['id'])
        ->where("is_like",2)
        ->first();
    }
    // 喜欢
    public static function like($req){
        $hasLike = article_like::hasLike($req);
         $hasDisLike =article_like::hasDisLike($req);
         if($hasDisLike){
             return json_encode([
                 "code"=>888,
                 "message"=>"你已经踩过了不能赞"
             ]);
         }
         if($hasLike){
            article_like::where("article_id",$_GET['id'])
                ->where("user_id",$req->jwt->id)
                ->delete();
            $num =  Article::where("id",$_GET['id'])->decrement("like");
            return json_encode([
                "code"=>300,
                "message"=>"取消赞成功",
                "num"=>$num
            ]);
         }else{
            article_like::insert([
                'user_id' =>$req->jwt->id,
                'article_id' => $_GET['id'],
                'is_like' => 1,
            ]);
            $num = Article::where("id",$_GET['id'])->increment("like");
            return json_encode([
                "code"=>200,
                "message"=>"点赞成功",
                "num"=>$num
            ]);
         }
    }
    // 不喜欢
    public static function disLike($req){
        $hasDisLike =article_like::hasDisLike($req);
         $hasLike = article_like::hasLike($req);
         if($hasLike){
             return  json_encode([
                 "code"=>888,
                 "message"=>"你已经点过赞了不能踩"
             ]);
         }
         if($hasDisLike){
            article_like::where("article_id",$_GET['id'])
                ->where("user_id",$req->jwt->id)
                ->delete();
            $num  = Article::where("id",$_GET['id'])->decrement("bulike");
            return json_encode([
                "code"=>300,
                "message"=>"取消踩成功",
                "num"=>$num
            ]);
         }else{
            article_like::insert([
                'user_id' =>$req->jwt->id,
                'article_id' => $_GET['id'],
                'is_like' => 2,
            ]);
            $num = Article::where("id",$_GET['id'])->increment("bulike");
            return json_encode([
                "code"=>200,
                "message"=>"踩成功",
                "num"=>$num
            ]);
         }
    }
    // 是否点赞或者踩
    public static function is_like($req){
        $hasLike = Article_like::hasLike($req);
        $hasDisLike =Article_like::hasDisLike($req);
        if($hasLike){
            return json_encode([
                "hasLike"=>true
            ]);
        }
        if($hasDisLike){
            return json_encode([
                "hasLike"=>false
            ]);
        }
    }
}
