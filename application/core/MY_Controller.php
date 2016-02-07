<?php
/**
 *
 */
class MY_Controller extends CI_Controller {
	public $data;
	public function __construct() {
		
		parent::__construct();
		if ($this->session->userdata('lang')) {
			$this->lang->load($this->session->userdata('lang'),$this->session->userdata('locale'));
		}
		else{
			$this->lang->load('vi','vietnamese');
		}
		$this -> load -> model('san_pham/m_san_pham');
		$this -> load -> model('san_pham/m_loai_san_pham');
		$this -> load -> model('san_pham/m_sp_km');
	}

}
?>