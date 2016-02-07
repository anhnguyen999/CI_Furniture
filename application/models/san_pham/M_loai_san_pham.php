<?php
/**
 *
 */
class M_loai_san_pham extends CI_Model {

	public function ds_loai_san_pham() {
		$lsp = array();
		$ds_loai_cha = $this -> db -> get_where('loai_san_pham', array('maloaicha' => '0'));
		if ($ds_loai_cha -> num_rows() > 0) {
			foreach ($ds_loai_cha ->result_array() as $loai_cha) {
				$lsp[] = array($loai_cha, $this -> ds_loai_san_pham_con($loai_cha['maloai']));
			}
		}
		return $lsp;

	}

	public function ds_loai_san_pham_con($maloai) {
		$loai_con = $this -> db -> get_where('loai_san_pham', array('maloaicha' => $maloai));
		if ($loai_con -> num_rows() > 0)
			return $loai_con -> result_array();
		return false;
	}

	//lay loai sp cha
	public function lay_loai_con($tenurl) {
		$this -> db -> where(array('tenloaiurl' => $tenurl));
		$query = $this -> db -> get('loai_san_pham');
		if ($query -> num_rows() > 0)
			return $query -> row_array();
		return false;
	}

	//lay loai sp con
	public function lay_loai_cha($maloai) {
		$this -> db -> where(array('maloai' => $maloai));
		$query = $this -> db -> get('loai_san_pham');
		if ($query -> num_rows() > 0)
			return $query -> row_array();
		return false;
	}

	public function san_pham_loai_con($maloai) {
		$this -> db -> select('`san_pham`.`masanpham`,`tensanpham`,`tensanphamurl`,`diengiai`,`dongia`,`hinh`,`sanphammoi`,`san_pham_khuyen_mai`.`dongiakm`,`san_pham_khuyen_mai`.`ghichu`,`san_pham_khuyen_mai`.`ngaybatdau`,`san_pham_khuyen_mai`.`ngayketthuc`');
		$this -> db -> from('san_pham');
		$this -> db -> join('san_pham_khuyen_mai', 'san_pham.masanpham=san_pham_khuyen_mai.id', 'left');
		$this -> db -> where(array('maloai' => $maloai));
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}

	public function tong_so_san_pham($tenloaiurl) {
		$this -> db -> select('*');
		$this -> db -> from('loai_san_pham');
		$result = $this -> db -> where('tenloaiurl', $tenloaiurl);
		$this -> db -> join('san_pham', 'san_pham.maloai=loai_san_pham.maloai');
		return $this -> db -> count_all_results();
	}

	public function ds_san_pham_phan_trang($id, $start, $limit) {
		$query = $this -> db -> get_where('san_pham', array('maloai' => $id), $limit, $start);
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}

}
?>