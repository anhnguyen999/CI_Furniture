<?php
class quan_tri extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> model('quan_tri/m_nd_table');
		$this -> load -> model('quan_tri/m_nd');
		$this -> load -> model('quan_tri/m_quantri_sp');
		$this -> load -> model('san_pham/m_san_pham');
		$this -> load -> model('san_pham/m_loai_san_pham');
	}

	public function index() {
		$data['title_name'] = "Quản Trị";
		if ($this -> session -> userdata['tendn'] == "") {
			redirect('quan-tri/dang-nhap');
		}
		$this -> load -> view('quan_tri/index_quan_tri', $data);
	}

	public function ds_nguoi_dung() {
		if ($this -> session -> userdata['tendn'] == "") {
			redirect('quan-tri/dang-nhap');
		}
		$dsnd = $this -> m_nd_table -> ds_nguoi_dung();
		$data['dsnd'] = $dsnd;
		$data['title_name'] = "Quản Trị Người Dùng";
		$data['path'] = 'quan_tri/v_them_nd';
		$this -> load -> view('quan_tri/index_quan_tri', $data);
	}

	public function them_nguoi_dung() {
		if ($this -> session -> userdata['tendn'] == "") {
			redirect('quan-tri/dang-nhap');
		}
		$this -> load -> library('form_validation');
		$data['nguoi_dung'] = array('ten_dang_nhap' => '', 'mat_khau' => '', 'ten_nguoi_dung' => '', 'ngay_sinh' => '', 'gioi_tinh' => 1, 'dia_chi' => '', 'email' => '', 'cmnd' => '', 'dien_thoai' => '', 'ma_loai_nguoi_dung' => '');
		if ($this -> input -> post('insert') != '') {
			$data['nguoi_dung'] = $this -> input -> post(null);
			$config = array( array('field' => 'ten_dang_nhap', 'label' => 'Tên đăng nhập', 'rules' => 'required|min_length[3]'), array('field' => 'mat_khau', 'label' => 'Mật khẩu', 'rules' => 'required|min_length[3]'), array('field' => 'ten_nguoi_dung', 'label' => 'Tên Người Dùng ', 'rules' => 'required|min_length[3]'), array('field' => 'ngay_sinh', 'label' => 'Ngày Sinh', 'rules' => 'required'), array('field' => 'gioi_tinh', 'label' => 'Giới Tính', 'rules' => 'required'), array('field' => 'dia_chi', 'label' => 'Địa Chỉ', 'rules' => 'required'), array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'), array('field' => 'cmnd', 'label' => 'CMND', 'rules' => 'required'), array('field' => 'dien_thoai', 'label' => 'Điện Thoại', 'rules' => 'required|min_length[10]'), );
			$this -> form_validation -> set_rules($config);
			$this -> form_validation -> set_message('required', 'Thiếu %s');
			$this -> form_validation -> set_message('min_length[3]', 'Tối thiểu %s kí tự');
			$this -> form_validation -> set_message('valid_email', '%s không hợp lệ');
			$this -> form_validation -> set_message('min_length[10]', 'Tối thiểu %s kí tự');

			if ($this -> form_validation -> run()) {
				$this -> load -> model('quan_tri/m_nd');
				$this -> m_nd -> setData($data['nguoi_dung']);
				$kq = $this -> m_nd_table -> them_nguoi_dung($this -> m_nd -> getData());
				if ($kq) {
					redirect('quan-tri/danh-sach-nguoi-dung');
				}
			}
		}
		$data['loai_nguoi_dung'] = $this -> m_nd_table -> loai_nguoi_dung();
		$data['path'] = 'quan_tri/v_them_ct_nd';
		$data['title_name'] = 'Thêm Người Dùng';
		$this -> load -> view('quan_tri/index_quan_tri', $data);
	}

	public function them_san_pham() {
		if ($this -> session -> userdata['tendn'] == "") {
			redirect('quan-tri/dang-nhap');
		}
		$this -> load -> helper('form');
		$data['path'] = 'quan_tri/v_them_sp';

		$this -> load -> library('form_validation');
		$config = array( array('field' => 'tensanpham', 'label' => 'Tên Sản Phẩm', 'rules' => 'required'), array('field' => 'dongia', 'label' => 'Đơn giá', 'rules' => 'required|numeric'), array('field' => 'diengiai', 'label' => 'Mô tả', 'rules' => 'required'), array('field' => 'ngaycapnhat', 'label' => 'Ngày Cập Nhật', 'rules' => 'required'));
		$this -> form_validation -> set_rules($config);
		$this -> form_validation -> set_message('required', 'Thiếu %s');
		$this -> form_validation -> set_message('numeric', '%s phải nhập số');
		if ($this -> form_validation -> run()) {
			$name_hinh = time() . '-' . $_FILES['hinh']['name'];
			$kq = $this -> upload_file($name_hinh);

			if ($kq === true) {
				$data['san_pham'] = $this -> input -> post();
				$data = $data['san_pham'];
				$data['hinh'] = $name_hinh;

				$result_insert_pro = $this -> m_san_pham -> them_sp($data);

				if ($result_insert_pro) {
					echo "<script>alert('Thêm thành công')</script>";

				}
			} else {
				$data['error'] = $kq;
			}

		}

		$data['loai_sp'] = $this -> m_quantri_sp -> them_san_pham();
		$this -> load -> view('quan_tri/index_quan_tri', $data);
	}

	public function ds_san_pham() {
		if ($this -> session -> userdata['tendn'] == "") {
			redirect('quan-tri/dang-nhap');
		}
		$this -> load -> library('pagination');

		$pag = $this -> uri -> segment(3);
		$config['base_url'] = base_url() . 'quan-tri/san-pham/';
		$config['total_rows'] = $this -> m_san_pham -> tong_san_pham();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
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
		$page = $this -> uri -> segment(3) ? $this -> uri -> segment(3) : 1;
		$start = ($page - 1) * $config['per_page'];
		$dssp_phan_trang = $this -> m_san_pham -> san_pham_phan_trang_admin($start, $config['per_page']);
		$data['dssp_phan_trang'] = $dssp_phan_trang;
		$data['link_page'] = $this -> pagination -> create_links();
		$data['ds_sp'] = $this -> m_san_pham -> view_all_pro();
		$data['path'] = 'quan_tri/v_doc_dssp';
		$this -> load -> view('quan_tri/index_quan_tri', $data);
	}

	public function dang_nhap() {
		//$this->load->helper('form');
		$this -> load -> library('form_validation');
		if ($this -> input -> post('login') != '') {
			$config = array( array('field' => 'tendn', 'label' => 'Tên Đăng Nhập', 'rules' => 'required'), array('field' => 'mat_khau', 'label' => 'Mật Khẩu', 'rules' => 'required'), array('field' => 'cap', 'label' => 'Mã Xác Thực', 'rules' => 'required'), );
			$this -> form_validation -> set_rules($config);
			$this -> form_validation -> set_message('required', 'Thiếu %s');
			if ($this -> form_validation -> run()) {
				$data = $this -> input -> post(null);
				$mxt_nhap = strtolower($data['cap']);
				$ip_address_clident = $this -> input -> ip_address();

				$word = $this -> session -> userdata('word');

				$ip_address_luu = $this -> session -> userdata('ip_address');
				$time_luu = $this -> session -> userdata('time');
				if ($mxt_nhap == $word && $ip_address_clident == $ip_address_luu && (time() - 600 < $time_luu)) {
					$this -> session -> unset_userdata(array('time', 'word', 'ip_address'));
					$user_dang_nhap = $this -> m_nd -> dang_nhap_quan_tri($data['tendn'], $data['mat_khau']);
					if (!$user_dang_nhap) {
						echo "<script>alert('Đăng nhập không thành công')</script>";
					} else {
						$arr_quan_tri = array('tendn' => $user_dang_nhap['tendn'], 'mat_khau' => $user_dang_nhap['mat_khau'], 'role' => $user_dang_nhap['ma_loai_nguoi_dung']);
						$this -> session -> set_userdata($arr_quan_tri);
						redirect('quan-tri');
					}
				} else {
					echo "<script>alert('Mã xác thực không đúng')</script>";
				}
			}
		}
		$this -> load -> helper('captcha');
		$vals = array('img_path' => './public/captcha/', 'img_url' => base_url() . './public/captcha/', 'font_path' => './public/fonts/arial.ttf', 'img_width' => '150', 'img_height' => 30, 'expiration' => 7200, 'word_length' => 8, 'font_size' => 16, 'img_id' => 'Imageid', 'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 'colors' => array('background' => array(255, 255, 255), 'border' => array(255, 255, 255), 'text' => array(0, 0, 0), 'grid' => array(255, 40, 40)));

		$cap = create_captcha($vals);
		/*echo $cap['image'];*/
		$arr_captcha = array('time' => $cap['time'], 'word' => strtolower($cap['word']), 'ip_address' => $this -> input -> ip_address(), );
		$this -> session -> set_userdata($arr_captcha);
		$data['image'] = $cap['image'];
		$data['path'] = 'quan_tri/v_dang_nhap';
		$this -> load -> view('quan_tri/v_dang_nhap', $data);
	}

	public function thoat() {
		$arr_quan_tri = array('tendn', 'nguoi_dung', 'role');
		$this -> session -> unset_userdata($arr_quan_tri);
		redirect('quan-tri/dang-nhap');
	}

	public function update() {
		$this -> load -> helper('form');
		$chuoi = $this -> uri -> segment(4);

		if (!$chuoi) {
			redirect('quan-tri/san-pham');
		}
		$chuoi = explode('/', $chuoi);
		$id = $chuoi[count($chuoi) - 1];
		$thong_tin = $this -> m_san_pham -> update_san_pham($id);

		$data['thong_tin_sp'] = $thong_tin;
		$data['id'] = $id;
		$ten_chung_loai = $this -> m_quantri_sp -> ds_chung_loai();
		$data['ds_chungloai'] = $ten_chung_loai;
		if ($this -> input -> post('update') != '') {
			unset($_POST['update']);
			$name_hinh = time() . '-' . $_FILES['hinh']['name'];
			$kq = $this -> upload_file($name_hinh);
			if ($kq === true) {
				$data = $this -> input -> post(null);
				$data['hinh'] = $name_hinh;
				$result = $this -> m_quantri_sp -> cap_nhat_sp($id, $data);
				if ($result) {
					redirect('quan-tri/san-pham');
				} else {
					echo "<script>alert('Cập nhật không thành công')</script>";
					return false;
				}
			}

		}
		$data['loai_sp'] = $this -> m_quantri_sp -> them_san_pham();
		$data['path'] = 'quan_tri/v-cap-nhat-sp';
		$this -> load -> view('quan_tri/index_quan_tri', $data);

	}

	public function upload_file($name_hinh) {
		$kq = false;
		$config['upload_path'] = './public/hinhsanpham/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000000;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$config['file_name'] = $name_hinh;
		$this -> load -> library('upload', $config);
		if (!$this -> upload -> do_upload('hinh')) {
			$kq = $this -> upload -> display_errors();
			return $kq;
		} else {
			$config1['image_library'] = 'gd2';
			$config1['source_image'] = './public/hinhsanpham/' . $name_hinh;
			$config1['wm_text'] = 'Ngo Hung Phuc';
			$config1['wm_type'] = 'text';
			$config1['wm_font_path'] = './public/fonts/arial.ttf';
			$config1['wm_font_size'] = '40';
			$config1['wm_font_color'] = 'ffffff';
			$config1['wm_vrt_alignment'] = 'bottom';
			$config1['wm_hor_alignment'] = 'center';
			$config1['wm_padding'] = '0';
			$this -> load -> library('image_lib', $config1);
			$this -> image_lib -> watermark();
			$this -> image_lib -> clear();
			return true;
		}
	}

	public function delete() {
		$chuoi = $this -> uri -> segment(4);
		if (!$chuoi) {
			redirect('quan-tri/san-pham');
		}
		$chuoi = explode('/', $chuoi);
		$id = $chuoi[count($chuoi) - 1];
		$result = $this -> m_quantri_sp -> xoa_san_pham($id);
		if ($result) {
			redirect('quan-tri/san-pham');
		} else {
			echo "<script>alert('Xóa không thành công')</script>";
		}
	}

}
?>