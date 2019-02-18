<?php
namespace App\Models;
use Validator;
use Illuminate\Database\Eloquent\Model;
use \Firebase\JWT\JWT;
class User extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = ['phone','pwd'];
    // 登录
    public static function login($req){
        $user = User::where("phone",$req->phone)->first();
        if($user){
            if($req->pwd==$user->pwd){
                $now = time();
                $data = array(
                    'iat'=>$now,
                    "exp"=>$now+env('JWT_EXPIRE'),
                    'id'=>$user->id,
                    'phone'=>$user->phone
                );
                $jwt = JWT::encode($data,env('JWT_KEY'));
                return json_encode([
                    'token'=>$jwt,
                    'code'=>"200"
                ]);
            }else{
                 return json_encode([
                    'message'=>"密码错误",
                    'code'=>"888!"
                ]);
            }
        }else{
            return json_encode([
                    'message'=>"用户名不存在",
                    'code'=>"888!"
                ]);
        }
    }
    // 注册
    public static function register($req){
        $Validator = Validator::make($req->all(),[
            'phone'=>'required|min:3|max:18',
            'pwd'=>'required|min:6|max:18'
        ]);
        if($Validator->fails()){
            $errors = $Validator->errors();
            return json_encode([
                'code'=>"888",
                'message'=>"验证失败 格式不正确或者手机号已存在"
            ]);
        }
        $Validator = Validator::make($req->all(),[
            'phone'=>'required|min:3|max:18|unique:user',
            'pwd'=>'required|min:6|max:18'
        ]);
        if($Validator->fails()){
            $errors = $Validator->errors();
            return json_encode([
                'code'=>"888",
                'message'=>"验证失败 格式不正确或者手机号已存在"
            ]);
        }
        $user = User::create($req->all());
        if($user){
            return json_encode([
                'code'=>"200",
                'message'=>"注册成功"
            ]);
        }else{
            return json_encode([
                'code'=>"999",
                'message'=>"注册失败"
            ]);
        }
    }
}
