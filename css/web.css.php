<style>
/*菜单*/
	.muBtns:hover,.muBtns.active{color: #fff;}/*normal*/
<?php if(!empty($goodsList)){foreach($goodsList as $k=>$v){?>
	.muBtns[data-page="Wine_<?php echo $k; ?>"]:hover,.muBtns[data-page="Wine_<?php echo $k; ?>"].active{color: <?php echo '#'.$v['color']; ?>;}/*<?php echo $v['goods_name'];?>*/
<?php }}?>
	
/*区块背景色*/
<?php if(!empty($goodsList)){foreach($goodsList as $k=>$v){?>
	#Wine_<?php echo $k; ?>{background-color:<?php echo '#'.$v['color']; ?>;}/*<?php echo $v['goods_name'];?>*/
<?php }}?>
/*最上面的页面的按钮背景色*/
<?php if(!empty($goodsList)){foreach($goodsList as $k=>$v){?>
	.hdBtn[data-page="Wine_<?php echo $k; ?>"]:hover{background: <?php echo '#'.$v['color']; ?>;color: #fff}/*<?php echo $v['goods_name'];?>*/
<?php }}?>
		
	#How2buy{background-color:#8c8c8c}
	#About{background-color:#000}
</style>