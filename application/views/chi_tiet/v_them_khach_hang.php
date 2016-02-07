<form action="" method="POST">
<div class="container">
  <div class="row">
        <div class="col-sm-12">
            <legend>Thông tin đơn hàng</legend>
        </div>
        <!-- panel preview -->
        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Họ tên khách hàng</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Hoten" name="Hoten">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Địa chỉ:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Diachi" name="Diachi">
                            <?php echo form_error('address'); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Điện thoại:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Dienthoai" name="Dienthoai">
                            <?php echo form_error('phone'); ?>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email">
                           <?php echo form_error('email'); ?>
                        </div>
                    </div>   
                   
                </div>
            </div>            
        </div> <!-- / panel preview -->
        <div class="col-sm-7">
            <h4>Thông Tin Đơn Hàng</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table preview-table">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Đơn giá</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                             <?php
                              $i=1;
                              foreach($thong_tin as $item)
                              {
                              ?>
                            <tbody>
                            
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $item['id']?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo number_format($item['price'])?></td>
                                    <td><?php echo number_format($item['qty'])?></td>
                                    <td><?php echo number_format($item['price']*$item['qty'])?></td>
                                   
                             
                            </tbody> <!-- preview content goes here-->
                             <?php 
                               $i++;} 
                              ?>
                        </table>
                    </div>                            
                </div>
            </div>
            <div class="row text-right">
                <div class="col-xs-12">
                    <h4>Tổng Tiền <?php echo number_format($this->cart->total());?><strong><span class="preview-total"></span></strong></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <input type="submit" class="btn btn-primary btn-block" name="btn_dathang" value="Tiến hành thanh toán">
                </div>                
            </div>
        </div>
  </div>
</div>
</form>