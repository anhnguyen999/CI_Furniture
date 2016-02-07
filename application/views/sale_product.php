	<div class="outlet">
	
		<h2>Chilai outlet</h2>
		<span style="font-size: 18px; line-height: 25px;"> Phân khúc hàng lỗi nhẹ hoặc hàng trưng bày, được cắt giảm giá xuyên suốt trong năm.
			<br>
			Sản phẩm chỉ bán tại Cửa hàng 302 Tô Hiến Thành, P.15, Q.10, Tp.HCM.
			<br>
			<br>
			<span style="font-size: 18px; font-family: Conv_Viet-ProximaNovaCond-Semibold;">3 lý do để mua hàng tại ChiLai OUTLET</span>
			<br>
			1. Cùng mẫu nhưng giá thấp hơn hàng chuẩn
			<br>
			2. Vẫn được áp dụng chế độ bảo hành riêng của ChiLai
			<br>
			3. Tất cả lỗi đều đã được xử lý qua trước khi đến tay khách hàng
		</span>
		
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading">Sản Phẩm Khuyến Mãi</div>
  			<div class="panel-body">
  			<div class="row">
   				<?php 
                   $i='';
                   foreach ($spkm as $item ) {
                    $i++;
                    ?>
   					
					  <div class="col-sm-6 col-md-6" >
					    <div class="thumbnail">
					    <a href="#" data-image-id="" data-toggle="modal" data-title="" data-caption="" data-image="<?php echo base_url('public/hinhsanpham/' . $item['hinh']); ?>" data-target="#image-popup<?php echo $i ?>">
					      <img src="<?php echo base_url('public/hinhsanpham/' . $item['hinh']); ?>" class="img-responsive" alt="<?php echo $item['tensanpham']?>" style=" width:50%"/>
					    </a>
					      <div class="caption">
					        <h3><?php echo $item['tensanpham']?></h3>
					        <p style="text-decoration:line-through">Đơn giá:<?php echo $item['dongia']?> VND</p>
					        <p>Đơn giá khuyến mãi:<?php echo $item['dongiakm']?> VND</p>
					        <p><a href="<?php echo site_url('san-pham-khuyen-mai/chi-tiet/'.$item['tensanphamurl'].'-'.$item['masanpham'])?>" class="btn btn-primary btn-block" role="button">Chi tiết</a></p>
					      </div>
					    </div>
					  </div>
				
   				<?php } ?>
   					</div>
  			</div>
	</div>
<?php 

$i='';
foreach ($spkm as $value ) {
$i++;

	?>
   
<div class="modal fade" id="image-popup<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel  " aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="<?php echo base_url('public/hinhsanpham/' . $value['hinh']); ?>">
            </div>
            <div class="modal-footer">

                <!-- <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>
                
                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>
                
                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php 
} 

?>