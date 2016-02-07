
<div class="row">
<ol class="breadcrumb">

  <li class="active">Chi tiết</li>
  <li class="active"><?php echo $spkm['tensanpham']; ?></li>
</ol>
<div class="col-md-4">
<div class="panel panel-default ">
  <div class="panel-heading"><?php echo $spkm['tensanpham']; ?></div>
  <div class="panel-body">
  <img src="<?php echo base_url('public/hinhsanpham/' . $spkm['hinh']); ?>" class="img-responsive" alt="<?php echo $spkm['tensanpham']; ?>" />
  </div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default ">
 <div class="panel-heading">Tóm tắt</div>
 <div class="panel-body">
        <p>Mã Sản Phẩm <?php echo $spkm['masanpham']; ?></p>
        <p>Tên Sản Phẩm <?php echo $spkm['tensanpham']; ?></p>
        <p style="text-decoration:line-through">Đơn Giá <?php echo $spkm['dongia']; ?>VND </p>
        <p>Đơn Giá Khuyến Mãi <?php echo $spkm['dongiakm']; ?>VND</p>
          <div class="form-group">

          Số Lượng:
          <input  name="soluong_sp" type="number" value="1"  max="20" min="0" class="form-control" maxlength="5" id="soluong_spkm" style="width:110px" />
          <?php $cart=$spkm['masanpham'] ?>
          <button type="button" name="<?php echo $cart;?>" id="muahangkm" class="btn btn-default"/>
          <span class="fa fa-shopping-cart" ></span> Add to cart</button>

          <a href="<?php echo base_url() ?>gio_hang/thong_tin" class="btn btn-info" id="cart_infokm">
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



<div class="bs-example bs-example-tabs review-tab" data-example-id="togglable-tabs">
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
      <li role="presentation" class=""><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Thông Số Kỹ Thuật</a></li>
      <li role="presentation" class="active"><a href="#danhgia" role="tab" id="danhgia-tab" data-toggle="tab" aria-controls="danhgia" aria-expanded="true">Đánh Giá</a></li>
      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade" id="home" aria-labelledby="home-tab">
        <p>
        <?php
		echo $spkm['tensanpham'] . "<br>";
		echo $spkm['diengiai'] . "<br>";
        ?>
        </p>
      </div>
      <div role="tabpanel" class="tab-pane fade active in" id="danhgia" aria-labelledby="danhgia-tab">
        <p><div class="fb-comments  visible-md visible-lg" data-href="" data-width="600" data-colorscheme="light" style="margin-top:20px;margin-bottom:20px"></div></p>
      </div>
      
    </div>
  </div>
</div>
