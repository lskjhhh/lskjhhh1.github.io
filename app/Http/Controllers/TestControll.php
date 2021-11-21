<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\UserInfo;
use App\ReModel;
use App\Comment;

class TestControll extends Controller
{
  // 添加
 public function add(){
    $UserModel=new UserModel();
    $UserModel->category='测试分类6';
    $UserModel->title='测试标题6';
    $UserModel->content='测试内容6';
    dump($UserModel->save());
  }
  // 查询文章
  public function query(){
    $data=UserModel::get();
    return $data;
  }
  // 查看详情
  public function queryDe($id){
    $data=UserModel::where('id',$id)->get();
    return $data;
  }
  // 用户注册
  public function register(Request $res){
      $name = $res->input('name');
      $user = $res->input('User');
      $pas = $res->input('password');
      $pas2 = $res->input('password2');
    
      $UserInfo=new UserInfo();
      $UserInfo->name=$name;
      $UserInfo->User=$user;
      $UserInfo->password=$pas;
      $UserInfo->password2=$pas2;
      $UserInfo->save();
      return "注册成功";
  }
  
  // 用户登录
  public function login(Request $res){
    $username=$res->input('username');
    $password=$res->input('password');
    $userinfo=UserInfo::where('User',$username)->first();
    if(!$userinfo){
      return '没有该用户！';
    }else{
      if($userinfo->password==$password){
        return $userinfo;
      }else{
        return '用户名或密码错误';
      }
    }
  }

  // 文章发布
  public function rel(Request $res){
     $rel=$res->input("rel");
     $cat=$res->input("cat");
     $tit=$res->input("tit");
     $re = new UserModel();
     $re->content=$rel;
     $re->title=$tit;
     $re->category=$cat;
     $re->save();
     return '发布成功';
  }

  // 评论发布
  public function com(Request $res){
    $com = new Comment();
    $com->cName=$res->input("cName");
    $com->cInfo=$res->input("cInfo");
    $com->com_id=$res->input("com_id");
    $com->save();
    return "发布成功";
  }
  // 查询评论
  public function commData($res){
    $data=Comment::where("com_id",$res)->get();
    return $data;
  }
}
