<?php
	/**
	* 
	*/
	class page
	{
		private $page;//当前页数
		private $pagenum;//每一页显示的数量
		private $totalnum;//总记录数
		private $totalpage;//总页数
		
		function __construct($sql,$pagenum,$page)
		{
			$this->sql=$sql;
			$this->pagenum=$pagenum;
			$this->page=$page;
		}

		//获取记录
		function getPage(){
			global $mysqli;

			$result=$mysqli->query($this->sql);
			$this->totalnum=$result->num_rows;
			$this->totalpage=ceil($this->totalnum/$this->pagenum);//获取总页数，向上取整

			if($this->page<=0){
				$this->page=1;
			}

			$startnum = ($this->page-1)*$this->pagenum;
			$this->sql.=" limit $startnum,$this->pagenum";
			$result=$mysqli->query($this->sql);
			return $result;

		}


		function getList(){
			// 当总记录数小于每页显示的记录
			if($this->totalnum<=$this->pagenum){
				echo "总记录数:$this->totalnum";
			}else{//当总记录数大于每页显示的记录数
				$prev=$this->page-1;
				//5页>=5页
				// 当前页面大于等于总页数
				if($this->page>=$this->totalpage){
					$next=$this->totalpage;//当前页面等于总页面数
				}else{//当前页面小于总页数1<2
					$next=$this->page+1;
				}
				echo "<a href='?page=1'>首页</a><a href='?page=$prev'>上一页</a>";
				// 如果总页数小于7页
				if($this->totalpage<=7){//如果当前页面等于循环中的$i高亮显示
					for($i=1;$i<=$this->totalpage;$i++){
						if($this->page==$i){
							echo "<a href='?page=$i' class='on'>$i</a>";
						}else{
							echo "<a href='?page=$i'></a>";
						}
					}
				}else{
					if($this->page==1 || $this->page==2 || $this->page==3)
	                {
	                    $b=1;
	                    $m=7;
	                }
	                if($this->page>3)
	                {
	                    $b= $this->page-3;
	                    $m= $this->page+3;
	                }
	                if($this->page==$this->totalpage || $this->page==$this->totalpage-1 || $this->page==$this->totalpage-2)
	                {
	                    $b=$this->totalpage-6;
	                    $m= $this->totalpage;
	                }
	                if($this->page>4)
	                {
	                    echo "...";
	                }
	                for($i=$b;$i<=$m;$i++){
	                    if($this->page==$i)
	                    {
	                        echo "<a href='?page=$i' class='on'>$i</a> ";
	                    }
	                    else{
	                        echo "<a href='?page=$i'>$i</a> ";
	                    }
	                }
	                if($this->page<$this->totalpage-3)
	                {
	                    echo "...";
	                }
				}
				echo "<a href='?page=$next'>下一页</a><a href='?page= $this->totalpage'>末页</a>";
			}
		}


	}
?>