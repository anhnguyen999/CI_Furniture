<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/ckfinder/ckfinder.js"></script>
<div class="panel panel-default">
	<div class="panel-heading">
		Thêm Sản Phẩm
	</div>
	<div class="panel-body">
		<?php
		if (isset($error)) {
			echo $error;
		}
		?>
		<?php echo form_open_multipart('quan-tri/san-pham/them-san-pham','class="form-horizontal form-addpd" role="form"')
		?>

		<div class="row">
			<div class="col-md-12">
				<div class='col-md-6'>
					<label for="tensanpham">Tên Sản Phẩm</label>
					<?php $data = array('name' => 'tensanpham', 'id' => 'tensanpham', 'value' => set_value('tensanpham', ''), 'placeholder' => 'Nhập tên sản phẩm', 'class' => 'form-control');
						echo form_input($data);
						echo form_error('tensanpham');
					?>
				</div>

				<div class="col-md-6">
					<label for="tensanphamurl">Tên URL</label>
					<?php $data = array('name' => 'tensanphamurl', 'id' => 'tensanphamurl', 'value' => set_value('tensanphamurl', ''), 'placeholder' => 'Tên URL', 'class' => 'form-control');
						echo form_input($data);
					?>
				</div>
				<div class="col-md-6">
					<label for="dongia">Đơn giá</label>
					<?php $data = array('name' => 'dongia', 'id' => 'dongia', 'value' => set_value('dongia', ''), 'placeholder' => 'Đơn giá', 'class' => 'form-control');
						echo form_input($data);
						echo form_error('don_gia');
					?>
				</div>

				<div class='col-md-6'>
					<label for="ngaycapnhat">Ngày Cập Nhật</label>
					<input type="date" class="form-control" id="ngaycapnhat" name="ngaycapnhat" value="<?php echo set_value('ngay_cap_nhat',date('d/m/Y')) ?>">
					<?php echo form_error('ngay_cap_nhat'); ?>
				</div>
				<div class='col-md-6'>
					<label for="chung_loai">Chủng Loại</label>
					<?php echo form_dropdown('maloai', $loai_sp, set_value('maloai'), 'class="form-control"'); ?>
				</div>
				<div class='col-md-6'>
					<label for="hinh">Hình</label>
					<?php $hinh = array('name' => 'hinh', 'id' => 'hinh', 'value' => set_value('hinh', ''), 'class' => 'form-control'); ?>
					<?php echo form_upload($hinh); ?>
				</div>

				<div class='col-md-12'>
					<label for="diengiai">Mô tả</label>
					<?php $data = array('name' => 'diengiai', 'id' => 'diengiai', 'value' => set_value('diengiai', ''), 'placeholder' => 'Mô tả', 'class' => 'ckeditor form-control', 'style' => 'width:100%');
						echo form_textarea($data);
						echo form_error('dien_giai');
					?>
				</div>

				<div class="col-md-12">
					<input type="button" class="btn btn-primary btn-block submit-add-product" value="Insert" name="insert" id="insert" style="margin-top: 40px;margin-bottom:40px"/>
				</div>

			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$('.submit-add-product').click(function() {

						$('.form-addpd').submit();
					})
				})
			</script>
			<?php echo form_close(); ?>
		</div>
	</div>
