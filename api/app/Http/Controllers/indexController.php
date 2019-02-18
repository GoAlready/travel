<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Article;
use App\models\Article_like;
use App\models\guide;
use App\models\orders;
use App\models\Comment;
class indexController extends Controller
{
    // 删除订单
    public function delOrder(Request $req){
        $data = orders::where("id",$req->id)->where("user_id",$req->jwt->id)->delete();
        if($data){
            return json_encode([
                "code"=>200,
                "message"=>"删除成功"
            ]);
        }else{
            return json_encode([
                "code"=>999,
                "message"=>"删除"
            ]);
        }
    }
    // 评论订单
    public function comment(Request $req){
        $article_id = orders::select("article_id")->where("id",$req->order_id)->first();
        $data = Comment::insert([
            "article_id"=>$article_id["article_id"],
            "Tourism_stars"=>$req->Tourism_stars,
            "time_stars"=>$req->time_stars,
            "major_stars"=>$req->major_stars,
            "service_stars"=>$req->service_stars,
            "content"=>$req->content,
            "user_id"=>$req->jwt->id,
        ]);
        if($data){
            $datas = orders::where("id",$req->order_id)->update([
                "is_comment"=>1
            ]);
            if($datas){
                 return json_encode([
                "code"=>200,
                "message"=>"评论成功"
            ]);
            }
        }else{
            return json_encode([
                "code"=>999,
                "message"=>"评论失败"
            ]);
        }
    }
    // 获取未支付的订单
    public function getWei(Request $req){
        return orders::where("order_type",0)->where("user_id",$req->jwt->id)->get();
    }
    // 获取未开始的订单
    public function getBegin(Request $req){
        return orders::where("order_type",1)->where("user_id",$req->jwt->id)->get();
    }
    // 获取已结束的订单
    public function getEnd(Request $req){
        return orders::where("order_type",2)->where("user_id",$req->jwt->id)->get();
    }
    // 获取未评论的订单
    public function getNoComment(Request $req){
        return orders::where("order_type",2)->where("is_comment",0)->where("user_id",$req->jwt->id)->get();
    }
    // 修改订单状态
    public function upOrder(Request $req){
        return orders::upOrder($req);
    }
    // 删除未支付订单
    public function delOrder_wei(Request $req){
        return orders::delOrder_wei($req);
    }
    // 获取订单信息
    public function getOrders(Request $req){
        return orders::where("user_id",$req->jwt->id)->where("id",$req->id)->with("guide")->first();
    }
    // 下订单
    public function orders(Request $req){
        return orders::addOrder($req);
    }
    // 获取所有的向导
    public function getGuideAll(){
        return guide::get();
    }
    // 获取向导的信息
    public function getGuide(){
        return guide::find($_GET['id']);
    }
    // 判断是否喜欢
    public function hasLike(Request $req){
        return Article_like::is_like($req);
    }
    // 喜欢
    public function articleLike(Request $req){
         return Article_like::like($req);
    }
    // 不喜欢
    public function articleDisLike(Request $req){
         return Article_like::disLike($req);
    }
    // 获取单个文章
    public function getArticleId(){
        return Article::with('comment')->with("guide")->where("id",$_GET['id'])->first();
    }
    // 获取文章
    public function getArticle(){
        return  Article::with('guide')->get();
    }
    // 注册
    public function register(Request $req){
        return User::register($req);
    }
    public function login(Request $req){
        return  User::login($req);
    }
}
