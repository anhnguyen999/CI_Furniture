<?php
/**
 *
 */
class M_sp_km extends CI_Model {

	public function chi_tiet_san_pham_km($id) {
		$this -> db -> select('`san_pham`.`masanpham`,`tensanpham`,`tensanphamurl`,`diengiai`,`san_pham.dongia`,`hinh`,`sanphammoi`,`san_pham_khuyen_mai`.`dongiakm`,`san_pham_khuyen_mai`.`ghichu`');
		$this -> db -> from('san_pham');
		$this->  db->  where('masanpham',$id);
		$this -> db -> join('san_pham_khuyen_mai', 'san_pham.masanpham=san_pham_khuyen_mai.id');

		//$this->db->where(array('ngaybatdau'<=date('Y-m-d'),'ngayketthuc'=>date('Y-m-d')));
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> row_array();
		}
		return false;
	}

}
?>