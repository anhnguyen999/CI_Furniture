<?php
class Khachhang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this-> load ->model('san_pham/m_khach_hang');
        $this-> load ->model('san_pham/m_khach_hang_table');
        $this -> load -> model('san_pham/m_loai_san_pham');
    }
    public function dathang()
    {   
        $data['thong_tin']=$this->cart->contents();
        $data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
        if($this->cart->contents()=='')
            return redirect(base_url());
                 $this -> load -> library('form_validation');    
        if($this->input->post('btn_dathang')!='')
        {

   
            $config = array(
                array('field' => 'Hoten','label' => 'Họ tên','rules' => 'required'),
                array('field' => 'Diachi','label' => 'Địa chỉ','rules' => 'required'),
                array('field' => 'Dienthoai','label' => 'Điện thoại','rules' => 'required'),
                array('field' => 'email','label' => 'Email','rules' => 'required|valid_email'),
            );        
            $this->form_validation->set_rules($config);
            $this->form_validation->set_message('required','%s phải nhập dữ liệu');
            if($this->form_validation->run())
            {
                $data=$this->input->post(null);

                unset($data['btn_dathang']);
               
                $this->m_khach_hang->setData($data);
                
                //them khach hang
                $makh=$this->m_khach_hang_table->them_khach_hang($this->m_khach_hang->getData());
                //them hoa don
                $dataHoa_don=array(
                    'ngay_hoadon'=>date('Y-m-d'), 'ma_kh'=>$makh, 'trigia_hd'=>$this->cart->total()
                ); 
               $SoHD=$this->m_khach_hang_table->them_hoa_don($dataHoa_don);
               //thêm thông tin mat hang
               $mang_ttct=array();
               foreach($this->cart->contents() as $item)
               {
                $mang_ttct[]=array(
                    'so_hd'=>$SoHD, 
                    'masanpham'=>$item['id'], 
                    'so_luong'=>$item['qty'], 
                    'don_gia'=>$item['price'], 
                    'thanh_tien'=>$item['qty']*$item['price']);
               }
               $kq= $this->m_khach_hang_table->them_ct_hoa_don($mang_ttct);
               $this->cart->destroy();
               $ttddh=$this->m_khach_hang_table->lay_thong_tin_ddh($SoHD);
               $this->gui_mail($ttddh);
               redirect('khach-hang/thong-tin-don-dat-hang/'.$SoHD);
            }            
        }        
        $data['path']=('chi_tiet/v_them_khach_hang');
        $this -> load -> view('chi_tiet/layout_chitiet', $data);
 
    }
    public function thongtindondathang()
    {
        $data['menu_header'] = $this -> m_loai_san_pham -> ds_loai_san_pham();
        $sohd=$this->uri->segment(3);
        $ttddh=$this->m_khach_hang_table->lay_thong_tin_ddh($sohd);
        $data['ttddh']=$ttddh;

        $data['path']='chi_tiet/v_thong_tin_don_dat_hang';
        $this->load->view('chi_tiet/layout_chitiet',$data); 
    }
    public function gui_mail($don_hang)
    {
        //cau hinh mail
            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mx1.hostinger.vn';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user'] = "ngohungphuc-ci@ngohungphuc-dev-ci.esy.es"; //gmail lam mail server
            $config['smtp_pass'] = "070695"; //password gmail
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            
            $this->email->initialize($config);
            $this->email->from('ngohungphuc95@gmail.com',''); //mail nguoi gui
            $this->email->to($don_hang[0]['email']);
            $this->email->subject('Thông tin đơng hàng');
            $this->email->message($this->tao_noi_dung($don_hang));
            $this->email->send();  
    }
    public function tao_noi_dung($don_hang)
    {
        
        $noi_dung='<p>Mã khách hàng'.$don_hang[0]['MaKH'].'</p>';
        $noi_dung.='<p>Tên khách hàng: '.$don_hang[0]['Hoten'] .'</p>';
        $noi_dung.='<p>Địa chỉ: '.$don_hang[0]['Diachi'].'</p>';
        $noi_dung.='<p>Email: '. $don_hang[0]['email'] .'</p>';
        $noi_dung.='<p>Điện thoại: '. $don_hang[0]['Dienthoai'] .'</p>';
  
        $noi_dung.='<table>
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã sả̉n phẩ̉m</th>
                <th>Tên sả̉n phẩ̉m</th>
                <th>Đơn giá</th>
                <th>Số lượ̣ng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>';
            $i=1;
            foreach($don_hang as $item)
            {
                $noi_dung.='<tr>';
                $noi_dung.='<th>'.$i.'</th>';
                $noi_dung.='<td>'.$item['masanpham'].'</td>';
                $noi_dung.='<td>'.$item['tensanpham'].'</td>';
                $noi_dung.='<td>'.$item['don_gia'].'</td>';
                $noi_dung.='<td>'.$item['so_luong'].'</td>';
                $noi_dung.='<td>'.$item['thanh_tien'].'</td>';
                $noi_dung.='</tr>';

                 $i++;
            }
        $noi_dung.='</tbody>';
        $noi_dung.='</table>';
        return $noi_dung;
        
    }
}
?>