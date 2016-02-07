
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo isset($title_name) ? $title_name : 'Ngô Hùng Phúc'; ?></title>
		<meta name="description" content="">
		<meta name="author" content="Ngo Hung Phuc">

		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
    	<link href="<?php echo base_url('public/css/bootstrap.min.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap-theme.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css')?>" />
   		<script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
    <script type="text/javascript">
		function bodau(str) {
			str = str.toLowerCase();
			str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
			str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
			str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
			str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
			str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
			str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
			str = str.replace(/đ/g, "d");
			str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
			str = str.replace(/-+-/g, "-");
			str = str.replace(/^\-+|\-+$/g, "");
			return str;
		}


		$(document).ready(function() {
			$("#tensanpham").blur(function() {

				var chuoi = $("#tensanpham").val();
				if (chuoi.length > 0) {
					$("#tensanphamurl").val(bodau(chuoi));
				}
			});
		});
    </script>
	</head>
    <nav class="navbar navbar-inverse ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url() ?>quan-tri">Ngo Hung Phuc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><?php echo anchor('quan-tri/san-pham', 'Sản Phẩm'); ?></li>
            <li><?php echo anchor('quan-tri/san-pham/them-san-pham', 'Thêm Sản Phẩm'); ?></li>
            <li><?php echo anchor('quan-tri/cong-trinh', 'Công Trình'); ?></li>
            <li><?php echo anchor('quan-tri/showroom', 'Showroom'); ?></li>
            <li><?php echo anchor('quan-tri/tin-tuc', 'Tin Tức'); ?></li>
            <li><?php echo anchor('quan-tri/khach-hang', 'Khách Hàng'); ?></li>
            <li><?php echo anchor('quan-tri/danh-sach-nguoi-dung', 'Người Dùng'); ?></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="<?php echo site_url()?>quan-tri/thoat">Hello <span class="glyphicon glyphicon-user"><?php if($this->session->userdata['tendn']) echo $this->session->userdata['tendn'] ?></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    
    </nav>
    <div class="container">
      <?php
	if (isset($path))
		$this -> load -> view($path);
	  ?>
     </div>