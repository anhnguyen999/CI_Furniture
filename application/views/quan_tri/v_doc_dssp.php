
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title" id="panel-title">Danh sách sản phẩm</h3>
      </div>
      <div class="panel-body" style="text-align:center">
        <table class="table table-striped" >
        <thead>
          <tr>
            <th>#</th>
            <th>Mã sp</th>
            <th>Tên sp</th>
            <th>Tên URL</th>
            <th>Ðon giá</th>
            <th>Mã Loại</th>
            <th>Hình</th>
            <th>Update/Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
         foreach ($dssp_phan_trang  as $sp) {?>

           <tr>

              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $sp['masanpham']?></td>
              <td><?php echo $sp['tensanpham']?></td>
              <td><?php echo $sp['tensanphamurl']?></td>
              <td><?php echo $sp['dongia']?></td>
              <td><?php echo $sp['maloai']?></td>
              <td> <img src="<?php echo base_url('public/hinhsanpham/' . $sp['hinh']); ?>" class="img-responsive" alt="<?php echo $sp['tensanpham']?>"/></td>
              <td>
                <a href="<?php echo base_url('quan-tri/san-pham/cap-nhat-san-pham/' . $sp['masanpham']); ?>" class="btn btn-danger" style="width:100%">Cập nhật</a>
                <a href="<?php echo base_url('quan-tri/san-pham/xoa-san-pham/' . $sp['masanpham']); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá ?')" style="width:100%">Xóa</a>
                </td>
          </tr>
          
          
           <?php $i = $i + 1;
			}
         ?>       
        </tbody>
      </table>
      <div class="row" align="center"><?php echo $link_page; ?></div>
      </div>
    </div>
