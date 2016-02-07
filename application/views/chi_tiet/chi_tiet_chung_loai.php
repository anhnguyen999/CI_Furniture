
<div class="row">
<ol class="breadcrumb">
  <li  class="active">Chi tiết</li>
  <li class="active"><?php echo $chi_tiet_san_pham['tensanpham']; ?></li>
</ol>
<div class="col-md-4">
<div class="panel panel-default ">
  <div class="panel-heading"><?php echo $chi_tiet_san_pham['tensanpham']; ?></div>
  <div class="panel-body img_pro">
  <img src="<?php echo base_url('public/hinhsanpham/' . $chi_tiet_san_pham['hinh']); ?>" class="img-responsive" alt="<?php echo $chi_tiet_san_pham['tensanpham']; ?>" />
  </div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
 <div class="panel-heading">Tóm tắt</div>
 <div class="panel-body">
        <p>Mã Sản Phẩm <?php echo $chi_tiet_san_pham['masanpham']; ?></p>
        <p>Tên Sản Phẩm  <?php echo $chi_tiet_san_pham['tensanpham']; ?></p>
        <p>Đơn Giá <?php echo $chi_tiet_san_pham['dongia']; ?></p>
     
          <div class="form-group">

          Số Lượng:
          <input  name="soluong_sp" type="number" value="1"  max="20" min="0" class="form-control" maxlength="5" id="soluong_sp"/>

          <button type="button" name="<?php echo $chi_tiet_san_pham['masanpham']; ?>" id="muahang" class="btn btn-default"/>
          <span class="fa fa-shopping-cart" ></span> Add to cart</button>
          <a href="<?php echo base_url() ?>gio_hang/thong_tin" class="btn btn-info" id="cart_info">
              <?php echo $this->cart->total_items();?> sản phẩm 
              <?php echo number_format($this->cart->total()); ?> VND
          </a>
        </div>

  <div style="margin-top:10px;margin-bottom:10px"
        class="fb-like visible-md visible-lg"
        data-share="true"
        data-width="450"
        data-show-faces="true">
  </div>
  </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default ">
 		<div class="panel-heading">Thông tin thêm</div>
 			<div class="panel-body">
				  Liên Hệ
				MUA HÀNG: 0903 79 70 70<br>
				
				BẢO HÀNH: 0903 79 89 98<br>
				
				GIẢI ĐÁP THẮC MẮC: 0909 78 68 22<br>
				
				EMAIL: hotro@chilai.com<br>
				
				© Copyright by phucngo<br>
			</div>
		</div>
	</div>
  <div id="show_message">
      <div class="alert alert-warning" role="alert"><img src="<?php echo base_url()?>public/logo/i_msg-note.png"> Đã thêm sản phẩm vào giỏ hàng</div>
  </div>
</div>
	</div>
</div>



<div class="bs-example bs-example-tabs review-tab" data-example-id="togglable-tabs">
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
      <li role="presentation" class=""><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Thông Số Kỹ Thuật</a></li>
      <li role="presentation" class="active"><a href="#danhgia" role="tab" id="danhgia-tab" data-toggle="tab" aria-controls="danhgia" aria-expanded="true">Đánh Giá</a></li>
      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade" id="home" aria-labelledby="home-tab">
        <p>
        <?php
		echo $chi_tiet_san_pham['tensanpham'] . "<br>";
		echo $chi_tiet_san_pham['diengiai'] . "<br>";
        ?>
        </p>
      </div>
      <div role="tabpanel" class="tab-pane fade active in" id="danhgia" aria-labelledby="danhgia-tab">
        <p><div class="fb-comments  visible-md visible-lg" data-href="" data-width="600" data-colorscheme="light" style="margin-top:20px;margin-bottom:20px"></div></p>
      </div>
      
    </div>
</div>

</div>
<div class="row">
  <ol class="breadcrumb">
  <li  class="active"><?php echo $chi_tiet_san_pham['tensanpham']; ?></li>
  <li class="active">Sản Phẩm Cùng Loại</li>
</ol>
<?php 
if ($sp_cung_loai) {
  foreach ($sp_cung_loai as $item ) {?>
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail img_pro">
      <img src="<?php echo base_url('public/hinhsanpham/' . $item['hinh']); ?>" class="img-responsive" alt="<?php echo $item['tensanpham']?>" />
      <div class="caption">
        <h3 id="name_product"><?php echo $item['tensanpham']; ?></h3>
        <p id="price_product"> <?php echo number_format($item['dongia']); ?> VND</p>
        <p><a href="<?php echo site_url('chi-tiet-san-pham/'.$item['tensanphamurl'].'-'.$item['masanpham'])?>" class="btn btn-primary btn-block" role="button">Chi tiết</a></p>
      </div>
    </div>
  </div>
  <?php

}
}
?>

</div>