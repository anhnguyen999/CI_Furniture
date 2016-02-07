
   <nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url() ?>">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><?php echo anchor('', 'Tài khoản'); ?></li>
            <li><?php echo anchor('san-pham-khuyen-mai', 'Sản Phẩm Khuyến Mãi'); ?></li>
            <li><?php echo anchor('', 'Sản Phẩm Yêu Thích'); ?></li>
            <li><?php echo anchor('gio_hang/thong_tin', 'Giỏ Hàng'); ?></li>
            <li><?php echo anchor('', 'Đăng Nhập'); ?></li>
            
          </ul>
			<ul class="nav navbar-nav navbar-right">
          	  <li><a href="<?php echo base_url() ?>Lang/en"><img src="<?php echo base_url() ?>/public/logo/en.png" alt="" title=""></a></li>
              <li><a href="<?php echo base_url() ?>Lang/vn"><img src="<?php echo base_url() ?>/public/logo/vi.png" alt="" title=""></a></li>
          	</ul>
        </div><!--/.nav-collapse -->
      </div>
    
    </nav>
<div class="logo_and_search">

	<div class="search">
		<input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
		<button type="submit" class="btn btn-primary btn-sm btn_search">
			Search
		</button>
	</div>
	<div class="logo">
        <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>public/logo/logo-chilai.png" /></a>
	</div>

</div>

<div class="menu">
	<div class="col-md-2 visible-lg">
		<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>public/logo/logo1.png" id="logo_left"></a>
	</div>
	<div class="col-md-10 nav-menu" >
		<nav class="navbar nav_menu"id="menu_sticky">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color: #888;border-color: #ddd;">
						<span class="icon-bar icon-dash" style="background-color: #ffffff;"></span>
						<span class="icon-bar icon-dash" style="background-color: #ffffff;"></span>
						<span class="icon-bar icon-dash" style="background-color: #ffffff;"></span>
					</button>
					<a class="navbar-brand visible-xs">Sản Phẩm</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
					
					<?php if($menu_header)
					{
					    
					foreach ($menu_header as $item) {
						$menu_cha=$item[0];
						$menu_con=$item[1];
                      
                       
					?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $menu_cha["tenloai"]?><span class="caret"></span></a>
							<ul class="dropdown-menu">
							<?php if($menu_con){
								foreach ($menu_con as $menu_loai_con) {
									# code...
								
							?>

								<li>
									<a href='<?php echo base_url()?>san-pham/<?php echo $menu_cha['tenloaiurl']?>/<?php echo $menu_loai_con['tenloaiurl']?>.html'><?php echo $menu_loai_con['tenloai'] ?></a>
								</li>
								<?php }
									}
								?>
							</ul>
						</li>
						<?php
						}
						}
						?>
					</ul>

				</div>
			</div>
		</nav>
	</div>
	<!--<div class="col-md-1 " id="logo_right">
	<img src="Public/logo/logo2.png" />-->
</div>
