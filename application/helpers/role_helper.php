<?php

function is_login()
{
   $ci = get_instance();
   if($ci->session->userdata('id')){
      $url = $ci->uri->segment(1);
      $url2 = "";

      if($ci->uri->segment(2)==true){
            $url2 = "/".$ci->uri->segment(2);
      }

      $url = $url.$url2;
      $role = $ci->session->userdata('department_id');

      if(!($ci->uri->segment(2) == 'save' OR $ci->uri->segment(2)=='update')){

         $access = $ci->db->query("SELECT 1 FROM akses a JOIN menu b ON a.menu_id = b.id WHERE a.department_id = $role AND b.url = '$url'")->num_rows();
         
         if($access==0){
            $ci->session->set_flashdata('gagal', 'Akses Ditolak');
            redirect($_SERVER['HTTP_REFERER']);
         }
         
      }
   } else {
      $ci->session->set_flashdata('info', 'Session Anda Telah Berakhir. SIlahkan Login Kembali');
      redirect('auth');
   }
}

function send_mail($data)
{
   $ci = get_instance();

   // $data['email'] = 'email';
   // $data['nama'] = 'toko';
   // $data['region'] = 'region';
   // $data['manager'] = 'manager';
   // $data['alamat'] = 'alamat';
   // $data['tgl_survey'] = 'tgl_survey';
   // $data['persentase'] = 'persentase';
   // $data['file'] = 'file';

   $config = [
         'protocol' => 'smtp',
         'smtp_host' => 'ssl://smtp.googlemail.com',
         'smtp_user' => 'ggalmair@gmail.com',
         'smtp_pass' => 'g1i2a3n4',
         'smtp_port' => 465,
         'mailtype' => 'html',
         'charset' => 'utf-8',
         'newline' => "\r\n"
   ];

   $ci->email->initialize($config);
   $ci->load->library('email', $config);

   $ci->email->from('ggalmair@gmail.com', 'My Way Out');
   $ci->email->to($data['email']);
   $subject = 'Laporan Hasil Survey Lapangan';
   $ci->email->subject($subject);

   $body = $ci->load->view('templates/email',$data,TRUE);
   $ci->email->message($body);
   $file = base_url('assets/report/') . $data['file'];
   $this->email->attach($file);
   $ci->email->send();
}

?>