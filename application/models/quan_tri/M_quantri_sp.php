<?php
/**
 *
 */
class M_quantri_sp extends CI_Model {

	public function them_san_pham() {
		$query = $this -> db -> get('loai_san_pham');
		$arr_lsp = array();
		if ($query -> num_rows() > 0) {
			foreach ($query -> result_array() as $item) {
				$arr_lsp[$item['maloai']] = $item['tenloai'];
			}
		}
		return $arr_lsp;
	}

	public function cap_nhat_sp($id, $data) {

		$this -> db -> where('masanpham', $id);
		$this -> db -> update('san_pham', $data);
		if ($this -> db -> affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function xoa_san_pham($id) {
		return $this -> db -> delete('san_pham', array('masanpham' => $id));

	}

	public function ds_chung_loai() {
		$query = $this -> db -> get('loai_san_pham');
		$arr_lsp = array();
		if ($query -> num_rows() > 0) {
			foreach ($query -> result_array() as $item) {
				$arr_lsp[$item['maloai']] = $item['tenloai'];
			}
		}
		return $arr_lsp;
	}

}
?>