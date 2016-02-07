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
    <div class="container">
     <div class="container">
        <div class="login-container">
             <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form action="" method="POST">
                        <input name="tendn" id="tendn" type="text" placeholder="username">
                        <?php echo form_error('tendn'); ?>
                        <input name="mat_khau" id="mat_khau" type="password" placeholder="password">
                        <?php  echo form_error('mat_khau'); ?>
                        <input type="text" class="form-control" placeholder="captcha" style="margin-top:10px" id="cap" name="cap">
                        <?php  echo form_error('cap'); ?> 
                        <?php echo $image; ?>
                        <input class="btn btn-info btn-block login btn-danger" type="submit" id="login" name="login" value="Login">
                    </form>
                </div>
       </div>
        
        </div>
     </div>
