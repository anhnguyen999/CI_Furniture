<?php
class M_nd_table extends CI_Model {
	public function ds_nguoi_dung() {
		$query = $this -> db -> query('select * from nguoi_dung');
		if ($query -> num_rows() > 0)
			return $query -> result();
		return false;
	}

	public function id_nguoi_dung($id) {
		$query = $this -> db -> query('select * from nguoi_dung where ma_nguoi_dung=?', array($id));
		if ($query -> num_rows() > 0)
			return $query -> row();
		return false;
	}

	public function them_nguoi_dung($data) {
		$result = $this -> db -> query('insert into nguoi_dung(`tendn`, `mat_khau`, `ten_nguoi_dung`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `email`, `cmnd`, `dien_thoai`, `ma_loai_nguoi_dung`) values(?,?,?,?,?,?,?,?,?,?)', array($data['ten_dang_nhap'], $data['mat_khau'], $data['ten_nguoi_dung'], $data['ngay_sinh'], $data['gioi_tinh'], $data['dia_chi'], $data['email'], $data['cmnd'], $data['dien_thoai'], $data['ma_loai_nguoi_dung']));
		return $result;
	}

	public function cap_nhat_nguoi_dung($data) {
		$result = $this -> db -> query('update nguoi_dung set `tendn`=?, `mat_khau`=?, `ten_nguoi_dung`=?, `ngay_sinh`=?, `gioi_tinh`=?, `dia_chi`=?, `email`=?, `cmnd`=?, `dien_thoai`=?, `ma_loai_nguoi_dung`=? where `ma_nguoi_dung`=?', array($data['ten_dang_nhap'], $data['mat_khau'], $data['ten_nguoi_dung'], $data['ngay_sinh'], $data['gioi_tinh'], $data['dia_chi'], $data['email'], $data['cmnd'], $data['dien_thoai'], $data['ma_loai_nguoi_dung']));
		return $this -> affected_row();
	}

	public function xoa_nguoi_dung($id) {
		$query = $this -> db -> query('delete from nguoi_dung where ma_nguoi_dung=?', array($id));
		return $this -> affected_row();
	}

	public function loai_nguoi_dung() {
		$query = $this -> db -> query('select * from loai_nguoi_dung');
		if ($query -> num_rows() > 0)
			return $query -> result();
		return false;
	}

}
?>