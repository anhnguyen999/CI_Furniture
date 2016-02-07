<?php
/**
 *
 */
class M_san_pham extends CI_Model {

	public function view_all_pro() {
		$query = $this -> db -> get('san_pham');
		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
		return false;
	}

	public function tong_san_pham() {
		$this -> db -> select('*');
		$this -> db -> from('san_pham');
		return $this -> db -> count_all_results();
	}

	public function san_pham_phan_trang_admin($start, $limit) {
		$query = $this -> db -> get('san_pham', $limit, $start);
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}

	public function san_pham_moi() {
		$query = $this -> db -> get_where('san_pham', array('sanphammoi' => 1), 0, 4);
		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
		return false;
	}

	public function san_pham_km() {
		$this -> db -> select('`san_pham`.`masanpham`,`tensanpham`,`tensanphamurl`,`diengiai`,`san_pham.dongia`,`hinh`,`sanphammoi`,`san_pham_khuyen_mai`.`dongiakm`,`san_pham_khuyen_mai`.`ghichu`');
		$this -> db -> from('san_pham');
		$this -> db -> join('san_pham_khuyen_mai', 'san_pham.masanpham=san_pham_khuyen_mai.id');

		//$this->db->where(array('ngaybatdau'<=date('Y-m-d'),'ngayketthuc'=>date('Y-m-d')));
		$query = $this -> db -> get();
		if ($query) {
			return $query -> result_array();
		}
		return false;
	}

	public function ten_chung_loai($tenurl) {
		$query = $this -> db -> get_where('loai_san_pham', array('tenloaiurl' => $tenurl));
		if ($query -> num_rows() > 0) {
			return $query -> row_array();
		}
		return false;
	}

	public function san_pham_id($id) {
		$query = $this -> db -> get_where('san_pham', array('masanpham' => $id));
		if ($query -> num_rows() > 0)
			return $query -> row_array();
		return false;
	}

	public function update_san_pham($id) {
		$query = $this -> db -> get_where('san_pham', array('masanpham' => $id));
		if ($query -> num_rows() > 0)
			return $query -> row_array();
		return false;
	}

	public function lay_id_cha($idcon) {
		$query = $this -> db -> get_where('san_pham', array('masanpham' => $idcon));
		if ($query -> num_rows() > 0) {
			return $query -> row_array();
		}
		return false;
	}

	/*public function tim_san_pham($name) {
		$query = $this -> db -> like('tensanpham', $name) -> get('san_pham');
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}*/

	public function them_sp($data) {
		return $this -> db -> insert('san_pham', $data);
	}

	public function san_pham_cung_loai($id, $maloai) {
		$query = $this -> db -> get_where('san_pham', array('masanpham !=' => $id, 'maloai' => $maloai));
		if ($query -> num_rows() > 0)
			return $query -> result_array();
		return false;
	}

	public function getSearchResult($key)
	{
		$this->db->like('tensanpham',$key);
		$this->db->order_by('tensanpham');
		$query=$this->db->get('san_pham');
		if ($query->num_rows()>0) {
			
			foreach ($query ->result_array() as $value) {
				$output[]= $value;
			
			}
		
			return $output;
			
		}
		else{
			return "<p>Không có kết quả </p>";
		}
	}
}
?>