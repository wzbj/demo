<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
    public function lst(){
        $cate=D('cate');
        $cateres=$cate->order("sort asc")->select();//desc降序，asc正序
        // dump($cateres);die;
        $this->assign('cateres',$cateres);
		$this->display();
    }
    public function add(){
        $cate=D('cate');
        if(IS_POST){
            $date['catename']=I('catename');
            // print_r($date);die;

            if($cate->create($date)){
                if($cate->add()){
                    // print_r($re);die;
                    $this->success('添加栏目成功'.U('lst'));
                }else{
                    $this->error('添加栏目失败');
                }
            }else{
                $this->error($cate->getError());
            }

            return;

        }

    	$this->display();
    }
    public function edit(){
    	$this->display();
    }
    public function del(){

    }

    public function sort(){
        // dump($_POST);
        $cate=D('cate');
        foreach($_POST as $id=>$sort){
            $cate->where()->setField();
        }
    }
}