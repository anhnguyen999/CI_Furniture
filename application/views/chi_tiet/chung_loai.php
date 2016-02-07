
<div class="row">
<?php

if($dssp_phan_trang){
  foreach ($dssp_phan_trang as $item) {
 ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail img_pro">
      <img src="<?php echo base_url('public/hinhsanpham/' . $item['hinh']); ?>" class="img-responsive" alt="<?php echo $item['tensanpham']?>" style="width:90%,height:450px"/>
      <div class="caption">
        <h3 id="name_product"><?php echo $item['tensanpham']; ?></h3>
        <p id="price_product"> <?php echo number_format($item['dongia']); ?> VND</p>
        <p><a href="<?php echo site_url('chi-tiet-san-pham/'.$item['tensanphamurl'].'-'.$item['masanpham'])?>" class="btn btn-primary btn-block" role="button">Chi tiết</a></p>
      </div>
    </div>
  </div>
  
<?php }

	}
	else{
?>
<div class="alert alert-warning" role="alert"><img src="<?php echo base_url()?>public/logo/i_msg-note.png">Sản phẩm chúng tôi đang cập nhật.</div>
 <?php } ?>

</div>
<div class="paging">
	<?php
	if (isset($link_page)) {
		echo $link_page;
	}
?>
</div>
