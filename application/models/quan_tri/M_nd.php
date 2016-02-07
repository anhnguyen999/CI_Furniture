<?php
/**
 *
 */
class M_nd extends CI_MODEL {
	private $ten_dang_nhap, $mat_khau, $ten_nguoi_dung, $ngay_sinh, $gioi_tinh, $dia_chi, $email, $cmnd, $dien_thoai, $ma_loai_nguoi_dung;
	public function setData($data) {
		$this -> ten_dang_nhap = isset($data['ten_dang_nhap']) ? $data['ten_dang_nhap'] : '';
		$this -> mat_khau = isset($data['mat_khau']) ? $data['mat_khau'] : '';
		$this -> ten_nguoi_dung = isset($data['ten_nguoi_dung']) ? $data['ten_nguoi_dung'] : '';
		$this -> ngay_sinh = isset($data['ngay_sinh']) ? $data['ngay_sinh'] : '';
		$this -> gioi_tinh = isset($data['gioi_tinh']) ? $data['gioi_tinh'] : 1;
		$this -> dia_chi = isset($data['dia_chi']) ? $data['dia_chi'] : '';
		$this -> email = isset($data['email']) ? $data['email'] : '';
		$this -> cmnd = isset($data['cmnd']) ? $data['cmnd'] : '';
		$this -> dien_thoai = isset($data['dien_thoai']) ? $data['dien_thoai'] : '';
		$this -> ma_loai_nguoi_dung = isset($data['ma_loai_nguoi_dung']) ? $data['ma_loai_nguoi_dung'] : 1;
	}

	public function getData() {
		$data = array('ten_dang_nhap' => $this -> ten_dang_nhap, 'mat_khau' => $this -> mat_khau, 'ten_nguoi_dung' => $this -> ten_nguoi_dung, 'ngay_sinh' => $this -> ngay_sinh, 'gioi_tinh' => $this -> gioi_tinh, 'dia_chi' => $this -> dia_chi, 'email' => $this -> email, 'cmnd' => $this -> cmnd, 'dien_thoai' => $this -> dien_thoai, 'ma_loai_nguoi_dung' => $this -> ma_loai_nguoi_dung, );
		return $data;
	}

	public function dang_nhap_quan_tri($tendn, $mat_khau) {
		$query = $this -> db -> get_where('nguoi_dung', array('tendn' => $tendn, 'mat_khau' => $mat_khau));
		if ($query -> num_rows() > 0) {
			return $query -> row_array();
		}
		return false;
	}

}
?>