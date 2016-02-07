<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/ckfinder/ckfinder.js"></script>
<div class="panel panel-default">
	<div class="panel-heading">
		Cập Nhật Sản Phẩm
	</div>
	<div class="panel-body">
		<?php echo form_open_multipart('quan-tri/san-pham/cap-nhat-san-pham/'.$id,'class="form-horizontal   form-update" role="form"')
		?>

		<div class="row">
			<div class="col-md-12">
				<div class='col-md-6'>
					<label for="tensanpham">Tên Sản Phẩm</label>
					<?php $data = array('name' => 'tensanpham', 'id' => 'tensanpham', 'value' => $thong_tin_sp["tensanpham"], 'class' => 'form-control');
						echo form_input($data);
					?>
				</div>

				<div class="col-md-6">
					<label for="tensanphamurl">Tên URL</label>
					<?php $data = array('name' => 'tensanphamurl', 'id' => 'tensanphamurl', 'value' => $thong_tin_sp["tensanphamurl"], 'class' => 'form-control');
						echo form_input($data);
					?>
				</div>
				<div class="col-md-6">
					<label for="dongia">Đơn giá</label>
					<?php $data = array('name' => 'dongia', 'id' => 'dongia', 'value' => $thong_tin_sp["dongia"], 'class' => 'form-control');
						echo form_input($data);
					?>
				</div>

				<div class='col-md-6'>
					<label for="ngaycapnhat">Ngày Cập Nhật</label>
					<?php $data = array('name' => 'ngaycapnhat', 'id' => 'ngaycapnhat', 'value' => $thong_tin_sp["ngaycapnhat"], 'class' => 'form-control', 'type' => 'date');
						echo form_input($data);
					?>
				</div>
				<div class='col-md-6'>
					<label for="chung_loai">Chủng Loại</label>
					<?php echo form_dropdown('maloai', $ds_chungloai, $thong_tin_sp['maloai'], 'class="form-control"'); ?>
				</div>
				<div class='col-md-6'>
					<label for="hinh">Hình</label>
					<?php $hinh = array('name' => 'hinh', 'id' => 'hinh', 'value' => $thong_tin_sp["hinh"], 'class' => 'form-control'); ?>
					<?php echo form_upload($hinh); ?>
				</div>

				<div class='col-md-12'>
					<label for="diengiai">Mô tả</label>
					<?php $data = array('name' => 'diengiai', 'id' => 'diengiai', 'value' => $thong_tin_sp["diengiai"], 'class' => 'ckeditor form-control', 'style' => 'width:100%');
						echo form_textarea($data);
					?>
				</div>

				<div class="col-md-12">
					<input type="submit" class="btn btn-primary btn-block submit-update" value="Update" name="update" id="update" style="margin-top: 40px;margin-bottom:40px"/>
				</div>

			</div>
			<!--<script type="text/javascript">
			$(document).ready(function(){
			$('.submit-update').click(function(){

			$('.form-update').submit();
			})
			})

			</script>-->
			<?php echo form_close(); ?>
		</div>
	</div>
