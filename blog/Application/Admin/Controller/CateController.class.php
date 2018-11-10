<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
    public function lst(){
		$this->display();
    }
    public function add(){
        $cate=D('cate');
        
        if(IS_POST){
            $date['catename']=I('catename');
            if($cate->add()){
                $this->success('添加栏目成功'.U('lst'));
            }else{
                $this->error('添加栏目失败');
            }
        }

    	$this->display();
    }
    public function edit(){
    	$this->display();
    }
    public function del(){

    }
}