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
		<link href="<?php echo base_url('public/jquery.bxslider/jquery.bxslider.css" rel="stylesheet')?>" />
        
        <script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
       	<script>
			$(window).load(function() {
				$(".menu").sticky({
					topSpacing : -20
				});
			});
	   </script>
	   	<script>
			( function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id))
						return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=1591301387785409";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));

			$(document).ready(function(){
				$('#muahangkm').click(function(){
					var id=$('#muahangkm').attr('name');
					var qty=$('#soluong_spkm').val();
					if (qty<=0 || qty=="") {
						alert("Vui long kiem tra lai");
					};
					$.ajax({url: "<?php echo site_url('Gio_hang/them_sp_km') ?>", 
						type:'POST',
						data:{idsp:id,sl:qty},
						dataType:'json',

						success: function(result){

				       	$("#cart_infokm").html(result["tsl"] + " sản phẩm " + result["tt"] + " VND");
				    }});
					
				});
			});

			$(document).ready(function(){
				$('#muahang').click(function(){
					var id=$('#muahang').attr('name');
					var qty=$('#soluong_sp').val();
					if (qty<=0 || qty=="") {
						alert("Vui long kiem tra lai");
					};
					$.ajax({url: "<?php echo site_url('Gio_hang/them_sp') ?>", 
						type:'POST',
						data:{idsp:id,sl:qty},
						dataType:'json',

						success: function(result){

				       	$("#cart_info").html(result["tsl"] + " sản phẩm " + result["tt"] + " VND");
				    }});
					
				});
			});

			$(function(){
				$('#show_message').fadeOut();
				$('#muahang').click(function(){
					$('#show_message').fadeIn(0).delay(2000).fadeOut(500);

				});
				$('#muahangkm').click(function(){
					$('#show_message').fadeIn(0).delay(2000).fadeOut(500);

				});
				
			});
	</script>
	</head>

	<body>
	<?php 
		if($path)
	{?>
		<div class="container-fluid">
		
			<header>
				<?php $this -> load -> view('chi_tiet/header'); ?>
			</header>

			<main id="details-content">
				<?php $this -> load -> view($path); ?>
			</main>

			<footer class="footer">
				<?php $this -> load -> view('chi_tiet/footer'); ?>
			</footer>

		</div>
		<?php } ?>	
	</body>
</html>
<script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('public/js/jquery.sticky.js')?>"></script>

