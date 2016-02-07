<div class="row">


<?php
if($thong_tin)
{
?>     
<form action="" method="post">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>STT</td>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Đơn giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
        <td>Xóa</td>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach($thong_tin as $item)
    {
    ?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $item['id']?></td>
        <td><?php echo $item['name']?></td>
        <td><?php echo number_format($item['price'])?></td>
        <td>
            <input type="number" name="<?php echo $item['rowid']?>" value="<?php echo $item['qty']?>"  style="width:50px"/>
        </td>
        <td><?php echo number_format($item['price']*$item['qty'])?></td>
        <td><a href="<?php echo site_url('gio_hang/xoa_mat_hang/'.$item['rowid']) ?>" class="btn btn-danger"  name="<?php echo $item['rowid']?>" id="btn_remove"><span class="glyphicon glyphicon-remove"></span></a></td>
      </tr>
    <?php
    $i++;
    }
    ?>      
    <tr>
        <td colspan="6"  align="right">Tổng trị giá hóa đơn</td>
        <td align="right"><?php echo number_format($this->cart->total());?></td>
    </tr>
    <tr>
        <td colspan="12"  align="center">
            <input class="btn btn-danger" type="submit" name="update" id="update" value="Cập nhật"/> 
            <a href="<?php echo base_url() ?>gio-hang/dat-hang" class="btn btn-success">Đặt hàng</a>
            <a href="<?php echo base_url() ?>gio-hang/xoa-gio-hang" class="btn btn-info">Xóa giỏ hàng</a>
        </td>
    </tr>
    </tbody>
  </table>
</form>
<?php
}
else{
?>
<div class="alert alert-warning" role="alert"><img src="<?php echo base_url()?>public/logo/i_msg-note.png">Giỏ hàng rỗng</div>
 <?php } ?>
</div>