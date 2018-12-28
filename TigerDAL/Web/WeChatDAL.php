<?php 
	/*
	*用来返回生成首页需要的数据
	*类
	*访问数据库用
	*继承数据库包
	*/
	class WeChatDAL extends BaseDAL{
		function __construct(){
			parent::__construct();
		}
		//获取酒列表
		public function GetWineList($currentPage,$pagesize,$category_id=0){
			$result="";
			$limit_start=($currentPage - 1) * $pagesize;
			$limit_end=$pagesize;
			$where ="";
			if($category_id!=0){
				$where.=" and cat_id=".$category_id." ";
			}
			$sql="select * from ".$this->table_name("goods")." as g left join ".$this->table_name("goods_i8n")." as i on g.goods_id=i.goods_id where i.i8n='".$_SESSION['lang']."' ".$where." order by top desc,cat_id asc,price desc limit ".$limit_start.",".$limit_end." ";
			$res=$this->getFetchAll($sql);
			if(!empty($res)){
				foreach($res as $k=>$v){
					$result[$v['goods_id']]=$v;
					if($v['is_sale']==1){
						$result[$v['goods_id']]['lastPrice']=$v['sale_price'];
					}else{
						$result[$v['goods_id']]['lastPrice']=$v['price'];
					}
				}
			}
			return $result;
		}
		//存订单
		public function SaveWineList($orderInfo){
			
			$amountPrice=0;
			$lastPrice=0;
			$consignee=$orderInfo["name"];
			$address=$orderInfo["address"];
			$cEmail=$orderInfo["email"];
			$consigneeTel=$orderInfo["tel"];
			$addTime=date("Y-m-d H:i:s");
			$editTime=$addTime;
			$orderSn="FMWeChat".date("YmdHis").rand(1000,9999);
			if(!empty($orderInfo["wineList"])){
				foreach($orderInfo["wineList"] as $k=>$v){
					$amountPrice+=$v["price"]*$v['number'];
					$lastPrice+=$v["lastPrice"]*$v['number'];
				}
				$sql="insert into ".$this->table_name("order")."(order_sn,amount_price,last_price,consignee,address,c_email,consignee_tel,add_time,edit_time) 
						values('".$orderSn."','".$amountPrice."','".$lastPrice."','".$consignee."','".$address."','".$cEmail."','".$consigneeTel."','".$addTime."','".$editTime."')";
				if($this->query($sql)){
					$orderId=mysql_insert_id();
					foreach($orderInfo["wineList"] as $k=>$v){
						$sql="insert into ".$this->table_name("order_detail")."(order_id,goods_id,goods_name,goods_overview,qty,price,last_price,add_time,edit_time) 
								values(".$orderId.",".$v['goods_id'].",'".$v['goods_name']."','".$v['goods_overview']."',".$v['number'].",'".$v['price']."','".$v['lastPrice']."','".$addTime."','".$editTime."')";
						$this->query($sql);
					}
				}
			}
			return $orderSn;
		}
		//获取单个订单简略信息
		public function GetOrderOverview($orderSn){
			$result="";
			if(!empty($orderSn)){
				$sql="select * from ".$this->table_name("order")." where order_sn='".$orderSn."' ";
				$result=$this->getFetchRow($sql);
			}
			return $result;
		}
		//发邮件功能
		public function mailTo($detail){
			include("./FillmoreDAL/MailDAL.php");
			$MailDAL=new MailDAL();
			/*获取基础配置信息*/
			$sql="select * from ".$this->table_name("config")."  where type='1' order by order_by asc ";
			$res=$this->getFetchAll($sql);
			$fromInfo=array();
			if(!empty($res)){
				foreach($res as $k=>$v){
					if(strpos($v['con_name'],'_arr')==false){
						$fromInfo[$v['con_name']]=$v['con_value'];
					}else{
						$arr=explode(';',$v['con_value']);
						$_arr='';
						foreach($arr as $ka=>$va){
							$_sarr=explode(':',$va);
							$_arr[$_sarr[0]]=$_sarr[1];
						}
						$fromInfo[$v['con_name']]=$_arr;
					}
					
				}
			}
			/*执行邮件发送*/
			return $MailDAL->mailTo($fromInfo,$detail);
		}
	}
?>