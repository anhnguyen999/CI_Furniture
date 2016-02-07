<?php 
/**
* 
*/
class Lang extends CI_Controller
{
	
	public function vn()
	{
		$language=array('lang' =>'vi' ,'locale' =>'vietnamese' );
		$this->session->set_userdata($language);
		redirect(base_url());
	}
	public function en()
	{
		$language=array('lang' =>'en' ,'locale' =>'english' );
		$this->session->set_userdata($language);
		redirect(base_url());
	}

}
 ?>