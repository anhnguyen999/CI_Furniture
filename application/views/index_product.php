<div class="row">
	<div class="col-md-9 news_pro_count">
		<h3> <?php if($dssp_moi) echo count($dssp_moi).' sản phẩm' ?></h3>
	</div>
	<div class="col-md-3">
		<!-- Controls -->
		<div class="controls pull-right">
			<a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev" </a>
			<a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
		</div>
	</div>
</div>

	<!-- Wrapper for slides -->
	
           <div  id="carousel-example" class="carousel slide " data-ride="carousel"> 
  <div class="carousel-inner" style="margin-top:10px;">
  <?php 
  
$i = 1;

$col = 0;
$tong_so = 1;
$a='';
 foreach($dssp_moi as $sp)
{ 
    $a++;
  
	if($col % 12 == 0)
	{
?>
    <div class="item <?php
	if ($i == 1)
		echo "active";
 ?>">
      <div class="row" style="margin-left:10px; margin-right:10px">
        <?php $dong = 1;
		}
		else
		{
		$dong = $dong + 1;
		}
	  ?>
        <div class="col-xs-6 col-sm-3 col-md-3 col_product">
              <div class="col-item">
                  <div class="photo">
                      <a href="#" data-image-id="" data-toggle="modal" data-title="" data-caption="" data-image="<?php echo base_url('public/hinhsanpham/' . $sp['hinh']); ?>" data-target="#image-popup<?php echo $a ?>"><img src="<?php echo base_url('public/hinhsanpham/' . $sp['hinh']); ?>" class="img-responsive" alt="a" /></a>
                  </div>
                  <div class="info">
                      <div class="row">
                          <div class="price  col-xs-12 col-md-12">
                              <h5> <a href="" class="hidden-sm"><?php echo $sp['tensanpham']; ?></a></h5>
                              <h5 class="price-text-color"> <?php echo number_format($sp['dongia']); ?>VNĐ</h5>
                          </div>
                      </div>
    
                      
                        <div class=" col-xs-12 col-md-12">
                         <p><a href="<?php echo site_url('chi-tiet-san-pham/'.$sp['tensanphamurl'].'-'.$sp['masanpham'])?>" class="btn btn-primary btn-block" role="button">Chi tiết</a></p>
                        </div>
                      
                      <div class="clearfix">
                      </div>
                  </div>
              </div>
          </div> 
        <?php
        if($dong  == 12)
		{
		?>
      </div>
    </div>
    <?php }
		if($tong_so == $sp & $tong_so %12!= 0)
		{
	?>
  </div>
</div>
<?php
}
$i = $i + 1;
$col = $col + 1;
$tong_so = $tong_so + 1;
}
?>  
            </div>    
        </div>
	</div>
<?php 

$a='';
foreach ($dssp_moi as $value ) {
$a++;

  ?>
   
<div class="modal fade" id="image-popup<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel  " aria-hidden="true">
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