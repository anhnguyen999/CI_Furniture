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
			function submit_search() {
				if (document.forms["form_search"]["key"].value.length == 0) {
					alert("Bạn chưa nhập từ khóa tìm kiếm");
					return false;
				} else {
					return true;
				}
			}
			
			function lookup(key){
          
                if(key.length==0){
                    $('#suggestions').fadeOut();
                }
                else{
                    $.post("application/views/search.php",{queryString: ""+key+""},function(data){
                         alert(data);
                         $('#suggestions').fadeIn();
                         $('#suggestions').html(data);
                    });
                }
            }
            
            jQuery(document).ready(function(){
                var offset=250;
                var duration=800;
                jQuery(window).scroll(function(){
                    if(jQuery(this).scrollTop() > offset){
                        jQuery('.back-to-top').fadeIn(duration);
                    }
                    else{
                         jQuery('.back-to-top').fadeOut(duration);
                    }
                });
                jQuery('.back-to-top').click(function(){

                    jQuery('html,body').animate({scrollTop:0},duration);
                    return false;
                })
               
            });
    
	   </script>

	</head>

	<body>
		<div class="container-fluid">
	
			<header>
				<?php $this -> load -> view('header'); ?>
			</header>

			<div class="clear-fix"></div>

			<div class="slider">
				<?php 
					$this->load->view('slider')
				?>
				
			</div>
        	
			<div class="info">
				<?php 
					$this->load->view('info')
				?>
				
			</div>

			<div class="sale-product">
				<?php 
					$this->load->view('sale_product')
				?>
				
			</div>

	   		<div class="dash"></div>

			<div class="row product_row">
			<?php $this -> load -> view('index_product'); ?>
			</div>

       		 <div class="dash"></div>

			<footer class="footer">
				<?php $this -> load -> view('footer'); ?>
			</footer>

		</div>
		
	</body>
</html>
<script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('public/js/jquery.sticky.js')?>"></script>

