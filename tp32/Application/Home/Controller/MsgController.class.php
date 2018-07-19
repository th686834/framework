<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index(){
    	//获取数据
    	$msgs=M('msg')->order('id desc')->select();
    	// dump($msgs);
    	//加载视图
       $this->assign("msgs",$msgs);
       $this->display('index');
    }
    public function add(){
    	if (IS_POST) {
        #2.接受数据
        $postData = I('post.');
        $postData['created_at'] = $postData['updated_at'] = time();
        #3.入库
        $rs = M('msg')->add($postData);
        #4.判断
         	if ($rs) {
            	$this->success('操作成功', U('msg/index'));
        	} else {
            	$this->error('操作失败', U('msg/index'));
        	}
    	}
    }
    public function sousuo(){
        if(IS_POST){
            $postData=I('POST.');
            // dump( $postData);die;
            $time1=strtotime($postData['created_at']); 
            $time2=strtotime($postData['updated_at'] );
             // dump($postData);
            $data=[
                  'create'=>['between',"$time1,$time2"],  
            ];
            $msgs=M('msg')->where($data)->order('id desc')->select();
            $this->assign("msgs",$msgs);
            $this->display('sousuo');
          
        }
    }
}