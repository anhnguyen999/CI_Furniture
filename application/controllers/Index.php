<?php
/**
 *
 */
class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title_name'] = 'Trang Chủ';
		$data['dssp_moi'] = $this -> m_san_pham -> san_pham_moi();
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$this -> data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$data['spkm'] = $this -> m_san_pham -> san_pham_km();
		$this -> load -> view('index', $data);
	}

	public function san_pham_khuyen_mai() {
		$data['path'] = 'chi_tiet/san_pham_khuyen_mai';
		$chuoi=$this->uri->segment(3);
		$chuoi=explode('-', $chuoi);
		$id=$chuoi[count($chuoi)-1];
		$data['spkm'] = $this -> m_sp_km -> chi_tiet_san_pham_km($id);
		$data['title_name']='Chi tiết '.$data['spkm']['tensanpham'];
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$this -> load -> view('chi_tiet/layout_chitiet', $data);
	}

	public function chi_tiet_sp() {
		$chuoi = $this -> uri -> segment(3);
		if (!$chuoi)
			redirect(site_url());
		$chuoi = explode('-', $chuoi);
		$id = $chuoi[count($chuoi) - 1];
		$chi_tiet = $this -> m_san_pham -> san_pham_id($id);
		$data['title_name'] = 'Chi tiết ' . $chi_tiet['tensanpham'];
		$data['path'] = 'chi_tiet/chi_tiet';
		$data['chi_tiet_san_pham'] = $chi_tiet;
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$this -> load -> view('chi_tiet/layout_chitiet', $data);

	}

	public function san_pham_theo_loai() {
		$this -> load -> library('pagination');
		$chuoi = $this -> uri -> segment(3);

		if (!$chuoi)
			redirect(site_url());
		$lsp_con = $this -> m_loai_san_pham -> lay_loai_con($chuoi);
		if (!$lsp_con)
			redirect(site_url());

		$lsp_cha = $this -> m_loai_san_pham -> lay_loai_cha($lsp_con['maloaicha']);
		$chi_tiet = $this -> m_san_pham -> ten_chung_loai($chuoi);
		$chi_tiet = $chi_tiet['tenloai'];
		$data['title_name'] = $chi_tiet;
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();

		$pag = $this -> uri -> segment(3);
		$config['base_url'] = site_url() . 'san-pham/' . $lsp_cha['tenloaiurl'] . '/' . $pag;
		$config['total_rows'] = $this -> m_loai_san_pham -> tong_so_san_pham($lsp_con['tenloaiurl']);
		$config['per_page'] = 6;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['first_link'] = '|<';
		$config['first_tag_open'] = '<li >';
		$config['first_tag_close'] = '</li >';
		$config['first_url'] = '';
		$config['last_link'] = '>|';
		$config['full_tag_close'] = '</ul>';
		$config['last_tag_open'] = '<li >';
		$config['last_tag_close'] = '</li >';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li >';
		$config['next_tag_close'] = '</li >';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li >';
		$config['prev_tag_close'] = '</li >';
		$config['cur_tag_open'] = '<li class="active"><a href="#"> ';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li >';
		$config['num_tag_close'] = '</li >';

		$this -> pagination -> initialize($config);
		$page = $this -> uri -> segment(4) ? $this -> uri -> segment(4) : 1;
		$start = ($page - 1) * $config['per_page'];
		$dssp_phan_trang = $this -> m_loai_san_pham -> ds_san_pham_phan_trang($lsp_con['maloai'], $start, $config['per_page']);
		$data['dssp_phan_trang'] = $dssp_phan_trang;
		$data['link_page'] = $this -> pagination -> create_links();
		$data['path'] = 'chi_tiet/chung_loai';
		$this -> load -> view('chi_tiet/layout_chitiet', $data);
	}

	public function chi_tiet_san_pham_theo_loai() {
		$chuoi = $this -> uri -> segment(2);
		if (!$chuoi)
			redirect(site_url());
		$chuoi = explode('-', $chuoi);
		$id = $chuoi[count($chuoi) - 1];
		$chi_tiet = $this -> m_san_pham -> san_pham_id($id);
		$data['title_name'] = 'Chi tiết ' . $chi_tiet['tensanpham'];
		$data['path'] = 'chi_tiet/chi_tiet_chung_loai';
		$data['chi_tiet_san_pham'] = $chi_tiet;
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$ma_loai_cha = $this -> m_san_pham -> lay_id_cha($id);
		$ma_loai_cha = $ma_loai_cha['maloai'];
		$data['sp_cung_loai'] = $ma_loai_cha;
		$data['sp_cung_loai'] = $this -> m_san_pham -> san_pham_cung_loai($id, $ma_loai_cha);
		$this -> load -> view('chi_tiet/layout_chitiet', $data);

	}
	public function tim_kiem()
	{
		/*$chuoi=$this->uri->segment(2);
		var_dump($chuoi);
		die;
		$data['chuoi']=$chuoi;
		$data['path'] = 'search';
		$this -> load -> view('chi_tiet/layout_chitiet', $data);*/
		/*$data['search_result']=$this->m_san_pham->getSearchResult($key);*/
		$data['title_name']='Kết Quả Tìm Kiếm';
		$key=$this->input->post('key');
		$query=$this->m_san_pham->getSearchResult($key);
		if ($query->num_rows()>0) {
			$data['search_result']=array();
			foreach ($query ->result() as  $value) {
				$data['search_result']=array('value'=>$value->tensanpham);
			}
		}
		echo json_encode($data);
		$data['path'] = 'search';
		$this -> load -> view('chi_tiet/layout_chitiet', $data);
	}
	/*public function ajaxsearch()
	{
		$key=$this->input->post('key');
		echo $this->m_san_pham->getSearchResult($key);
	}*/
}
?>