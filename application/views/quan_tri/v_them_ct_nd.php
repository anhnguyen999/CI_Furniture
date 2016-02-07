<div class="panel panel-default">
	<div class="panel-heading">
		Thêm Người Dùng
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="post" action="">
			<div class="row">
				<div class="col-md-12">
					<div class='col-md-6'>
						<label for="ten_dang_nhap">Tên Đăng Nhập</label>
						<input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" value="" placeholder="Tên Đăng Nhập">
						<?php echo form_error('ten_dang_nhap'); ?>
					</div>

					<div class="col-md-6">
						<label for="mat_khau">Mật Khẩu</label>
						<input type="text" class="form-control" id="mat_khau" name="mat_khau" value="" placeholder="Mật Khẩu" >
						<?php echo form_error('mat_khau'); ?>
					</div>
					<div class="col-md-6">
						<label for="ten_nguoi_dung">Tên Người Dùng </label>
						<input type="text" class="form-control" id="ten_nguoi_dung" name="ten_nguoi_dung" value="" placeholder="Tên Người Dùng ">
						<?php echo form_error('ten_nguoi_dung'); ?>
					</div>

					<div class='col-md-6'>
						<label for="ngay_sinh">Ngày Sinh</label>
						<input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="" placeholder="Ngày Sinh">
						<?php echo form_error('ngay_sinh'); ?>
					</div>
					<div class='col-md-6'>
						<label for="gioi_tinh">Giới Tính</label>
						<input type="text" class="form-control" id="gioi_tinh" name="gioi_tinh" value="" placeholder="Nhập 0 nếu là Nam,1 nếu là Nữ">
						<?php echo form_error('gioi_tinh'); ?>
					</div>
					<div class='col-md-6'>
						<label for="dia_chi">Địa Chỉ</label>
						<input type="text" class="form-control" id="dia_chi" name="dia_chi" value="" placeholder="Địa Chỉ">
						<?php echo form_error('dia_chi'); ?>
					</div>
					<div class='col-md-6'>
						<label for="email">email:</label>
						<input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
						<?php echo form_error('email'); ?>
					</div>
					<div class='col-md-6'>
						<label for="cmnd">CMND</label>
						<input type="text" id="cmnd" name="cmnd" value="" placeholder="CMND" class="form-control"/>
						<?php echo form_error('cmnd'); ?>
					</div>
					<div class='col-md-6'>
						<label for="dien_thoai">Điện Thoại</label>
						<input type="text" id="dien_thoai" name="dien_thoai" value="" placeholder="Điện Thoại" class="form-control"/>
						<?php echo form_error('dien_thoai'); ?>
					</div>
					<div class='col-md-6'>
						<label for="ma_loai_nguoi_dung">Chức Vụ</label>
						<select name="ma_loai_nguoi_dung" class="form-control">
							<?php
							if($loai_nguoi_dung){
								foreach($loai_nguoi_dung as $l_nd){?>
									<option value="<?php echo $l_nd->ma_loai_nguoi_dung?>" selected="selected"><?php echo $l_nd->ten_loai?></option>
							<?php }
										}
							?>
						</select>

					</div>
				</div>
				<div class="col-md-12">
					<input type="submit" class="btn btn-primary btn-block" value="Insert" name="insert" id="insert" style="margin-top: 40px;margin-bottom:40px"/>
				</div>

			</div>

		</form>
	</div>
</div>