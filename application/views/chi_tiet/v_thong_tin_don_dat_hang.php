<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Thông tin đợn đặt hàng</h3>
  </div>
  <div class="panel-body">
    <h4 class="sub-header">Đợn đặt hàng của khách hàng</h4>
        <div class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2">Số hóa đơn:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['so_hd']?></p>
              </div>
              <label class="control-label col-sm-2">Ngày hóa đơn:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['ngay_hoadon']?></p>
              </div>
            </div>
           <div class="form-group">
              <label class="control-label col-sm-2">Mã khách hàng:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['MaKH']?></p>
              </div>
              <label class="control-label col-sm-2">Tên khách hàng:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['Hoten']?></p>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2">Địa chỉ:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['Diachi']?></p>
              </div>
             
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2">Email:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['email']?></p>
              </div>
              <label class="control-label col-sm-2">Điện thoại:</label>
              <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ttddh[0]['Dienthoai']?></p>
              </div>
            </div>
            </div>
    <!--chi tiet hoa don -->
            <table class="table table-striped">
            <thead>
              <tr>
                <td>STT</td>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td align="right">Đơn giá</td>
                <td align="right">Số lượng</td>
                <td align="right">Thành tiền</td>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach($ttddh as $item)
              {
              ?>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $item['masanpham']?></td>
                <td><?php echo $item['tensanpham']?></td>
                <td align="right"><?php echo number_format($item['don_gia'])?></td>
                <td align="right"><?php echo $item['so_luong']?></td>
                <td align="right"><?php echo number_format($item['thanh_tien'])?></td>
              </tr>
              <?php $i++; }?>
              <tr >
                <td colspan="5" align="right">Trị giá hóa đơn</td>
                <td align="right"><?php echo number_format($ttddh[0]['trigia_hd'])?></td>
              </tr>
            </tbody>
          </table>
  <!--end chi tiet hoa don -->
      </div>
  </div>
</div>
<!--'SELECT `khach_hang`.`MaKH`, `Hoten`, `Diachi`, `Dienthoai`, 
`Diachigiaohang`, `email`,`hoa_don`.`so_hd`,`ngay_hoadon`,`trigia_hd`,
`san_pham`.`masanpham`,`tensanpham`,`hinh`,`so_luong`,`don_gia`,`thanh_tien` FROM `khach_hang`,`hoa_don`,`ct_hoa_don`,`san_pham` WHERE 1 and `khach_hang`.`MaKH`=`hoa_don`.`ma_kh` and `ct_hoa_don`.`so_hd`=`hoa_don`.`so_hd` and 
`ct_hoa_don`.`masanpham`=`san_pham`.`masanpham` and `hoa_don`.`so_hd`=?';-->