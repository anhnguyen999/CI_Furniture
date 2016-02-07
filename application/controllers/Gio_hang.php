<?php 
/**
* 
*/
class Gio_hang extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this -> load -> model('san_pham/m_san_pham');
		$this -> load -> model('san_pham/m_loai_san_pham');
		$this -> load -> model('san_pham/m_sp_km');
	}
	public function them_sp_km()
	{
		$msp=$this->input->post('idsp');
		$sl=$this->input->post('sl');
		$san_pham=$this->m_sp_km->chi_tiet_san_pham_km($msp);
		$dongia=$san_pham['dongiakm'];
		$data = array(
	        'id'      => $msp,
	        'qty'     => $sl,
	        'price'   => $dongia,
	        'name'    => $san_pham['tensanpham']
		);
		$this->cart->insert($data);
		echo json_encode(array('tsl'=>$this->cart->total_items(),'tt'=>$this->cart->total()));
	}
	public function them_sp()
	{
		$msp=$this->input->post('idsp');
		$sl=$this->input->post('sl');
		$san_pham=$this->m_san_pham->san_pham_id($msp);
		$dongia=$san_pham['dongia'];
		$data = array(
	        'id'      => $msp,
	        'qty'     => $sl,
	        'price'   => $dongia,
	        'name'    => $san_pham['tensanpham']
		);
		$this->cart->insert($data);
		echo json_encode(array('tsl'=>$this->cart->total_items(),'tt'=>$this->cart->total()));
	}	
	public function thongtin()
	{
		if ($this->input->post('update')!='') {
			$info=$this->cart->contents();

			$arr_update=array();
			foreach ($info as $item) {
				$qty=$this->input->post($item['rowid']);

				if ($qty > 0 && $qty != $item['qty']) {
					$arr_update[]=array('rowid'=>$item['rowid'],'qty'=>$qty);
					$this->cart->update($arr_update);
					
				}
			}
		}
		
		$data['thong_tin']=$this->cart->contents();
		$data['path']='chi_tiet/gio_hang';
		$data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
		$this->load->view('chi_tiet/layout_chitiet',$data);
	}
	public function xoa_mat_hang()
	{
		$rowid=$this->uri->segment(3);
		$this->cart->remove($rowid);
		redirect('gio_hang/thong_tin');
	}
	public function xoa_gio_hang()
	{
		$this->cart->destroy();
		redirect('gio_hang/thong_tin');
	}
}

 ?>