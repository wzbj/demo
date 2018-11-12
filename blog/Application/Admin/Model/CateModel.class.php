<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {
   protected $_validate  = array(
        array('catename','require','添加栏目不能为空!',1,'regex',3),//在新增的时候验证name是否唯一
        array('catename','','添加栏目不得重复!',1,'unique',3),//在新增的时候验证name是否唯一
   );
}