<?php
class Login extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('email');
        error_reporting(0);
    }

    function js(){
        echo "<p>Please enable javascript in your browser and try again</p>";
    }


    function index(){
        if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id') == "") {
            redirect('admin/login');
        } else {
            $this->load->view('admin/welcome');
        }
    }

    public function pass_re(){
        if (empty($_POST)) {
            $data['msg'] = $msg;
            $data['url'] = site_url('login/pass_re_ins/');
            $this->load->view('admin/pass_re', $data);
        }
    }

    public function pass_re_ins(){
        $this->form_validation->set_rules('email', 'Email Address ', 'valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data['msg'] = "Invalid Email Format";
            $this->load->view('admin/pass_re', $data);
        } else {
            if ($this->input->post('email') != ''); {
                $this->db->where(array(
                    'email' => $this->input->post('email')
                ));
                $query = $this->db->get('admin');
                $code  = $query->result();
                $dcode = count($code);
                foreach ($code as $srv):
                    $prog = $srv->password;
                    $user = $srv->username;
                    $add  = trim($srv->email);
                endforeach;
                if ($dcode >= 1) {
                    $this->load->library('encrypt');
                    $progg   = trim($this->encrypt->decode($prog));
                    $add     = trim($srv->email);
                    $subject = "Admin Password Recover";
                    $message = "
                    <html>
                    <head>
                    <title>Admin Password Recover</title>
                    </head>
                    <body>
                    <div>
                    <div>
                    
                    <p> <b>Iilab Admin ,\n \n</br>
                    Your Password Is: &nbsp;" . $progg . "&nbsp; and \n\n\n</b></p></br><p>
                    <p>
                    <b>Username Is: &nbsp;" . $user . "\n\n\n</b></p></br><p>
                    </div>
                    </div>
                    </body>
                    </html>";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'To: info <info@example.com>' . "\r\n";
                    $headers .= 'From:it@mblbd.com ' . "\r\n";
                    if (mail($add, $subject, $message, $headers)) {
                        $this->load->view('admin/pass_success');
                    } else {
                        $data['msg'] = "E-mail Does Not Sent";
                        $this->load->view('admin/pass_re', $data);
                    }
                } else {
                    $msg = 'E-mail Address Not Match';
                    redirect('login/pass_re/' . $msg);
                }
            }
        } // else end
    }

    public function pass_success(){
        $this->load->view('admin/pass_success');
    }
    /* function make_pass(){
    echo '<b>123456:</b> '.$this->encrypt->encode('123456');
    echo '<br/><b>admin</b> '.$this->encrypt->encode('admin');
    } */
}