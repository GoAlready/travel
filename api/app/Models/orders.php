<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    public function guide(){
        return $this->belongsTo("App\Models\guide","guide_id");;
    }
    protected $fillable = ['city','order_code','yiyuan','num','remarks','guide_id','money','user_id','user_time'];

    public static function upOrder($req){
        $data = orders::where("id",$_GET['id'])->where("user_id",$req->jwt->id)->where("order_type",0)->update([
            "order_type"=>1,
            "pay_type"=>$_GET['pay']
        ]);
        $guideid = orders::select("guide_id")->where("user_id",$req->jwt->id)->where("id",$_GET['id'])->first();
        guide::where("id",$guideid['guide_id'])->increment("receipt_num");
        if($data)
        {
            return json_encode([
                "code"=>200,
                "message"=>"修改成功"
            ]);
        }else {
            return json_encode([
                "code"=>999,
                "message"=>"已修改"
            ]);
        }
    }
    public static function delOrder_wei($req){
        $data = orders::where("user_id",$req->jwt->id)->where("order_type",0)->where("id",$req->id)->delete();
        if($data){
            return json_encode([
                "code"=>200,
                "message"=>"删除成功"
            ]);
        }else{
            return json_encode([
                "code"=>999,
                "message"=>"删除失败或已删除"
            ]);
        }
    }

    public static function addOrder($req){
        $code = rand(111111111111,999999999999);
        $money = Article::select("money")->where("id",$req->articleId)->first();
        $data = orders::insertGetId ([
            "order_code"=>$code,
            "city"=>$req->city,
            "yiyuan"=>$req->checkyiyuan[0],
            "remarks"=>$req->beizhu,
            "guide_id"=>$req->guideAId,
            "user_time"=>$req->time,
            "num"=>$req->num,
            "money"=>$money["money"],
            "user_id"=>$req->jwt->id,
            "article_id"=>$req->articleId,
        ]);
        if($data){
            return json_encode([
                "code"=>200,
                "message"=>"下单成功",
                "id"=>$data
            ]);
        }else{
            return  json_encode([
                "code"=>999,
                "message"=>"下单失败",
            ]);
        }
    }
}
