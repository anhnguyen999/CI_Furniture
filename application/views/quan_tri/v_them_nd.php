
<table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>ma nguoi dung</th>
          <th>ten </th>
          <th>ten dang nhap</th>
          <th>ngay sinh</th>
          <th>gioi tinh</th>
          <th>dia chi</th>
          <th>email</th>
          <th>cmnd</th>
          <th>dt</th>
          <th>chuc vu</th>
        </tr>
      </thead>
      <tbody>
      <?php 
		if(isset($dsnd))
		
		{
		  	 $i=1;
		    foreach($dsnd as $nd)
		   {
		     	   
		?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $nd -> ma_nguoi_dung; ?></td>
          <td><?php echo $nd -> ten_nguoi_dung; ?></td>
          <td><?php echo $nd -> tendn; ?></td>
          <td><?php echo $nd -> ngay_sinh; ?></td>
          <td><?php echo $nd -> gioi_tinh; ?></td>
          <td><?php echo $nd -> dia_chi; ?></td>
          <td><?php echo $nd -> email; ?></td>
          <td><?php echo $nd -> cmnd; ?></td>
          <td><?php echo $nd -> dien_thoai; ?></td>
          <td><?php echo $nd -> ma_loai_nguoi_dung; ?></td>    
        </tr>
       	<?php
		$i++;
		}
		}
 		?> 
      </tbody>
    </table>
    
   
</div>
 <a href="nguoi-dung/them-nguoi-dung" class="btn btn-block btn-danger"<span class="glyphicon glyphicon-plus"></span> Thêm người dùng</a>

<!-- `ma_nguoi_dung`, `tendn`, `mat_khau`, `ten_nguoi_dung`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `email`, `cmnd`, `dien_thoai`, `ma_loai_nguoi_dung` -->