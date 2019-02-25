<?php
class create_user extends CI_Controller
{
    function __construct(){
        parent::__construct();
        //$this->load->model('home_model');
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->library('email');
        $this->load->helper('security');
        $this->load->library('encrypt');
        $this->load->library('session');
        //error_reporting(0);
    }
    
    public function js(){
        echo "<p><font color='Red'><i>JavaScript has been disabled</i> in your web browser. Please enable JavaScript and <a href='" . base_url() . "'>try again</a>.</p>";
    }

    public function index(){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin")
            redirect('login');
        //$data['atm_region'] = $this->Users_model->get_atm_region_list_all();
        $this->load->library('pagination');
        $config['base_url']      = site_url('create_user/user');
        $config['total_rows']    = $this->Users_model->get_user_count();
        $config['per_page']      = '10';
        $config['cur_tag_open']  = '<a class=current>';
        $config['cur_tag_close'] = '</a>';
        $config['first_link']    = 'First';
        $config['last_link']     = 'Last';
        $config['next_link']     = 'Next';
        $config['prev_link']     = 'Prev';
        $this->pagination->initialize($config);
        $data['x']    = $pg + 1;
        $data['user'] = $this->Users_model->get_user_list($config['per_page'], $pg);
        $this->load->view('admin/user_view', $data);
    }

    //-----------------------ip authenticate--------------------------
    function user($pg = 0){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin") {
            $this->load->library('pagination');
            $config['base_url']      = site_url('create_user/user');
            $config['total_rows']    = $this->Users_model->get_user_count();
            $config['per_page']      = '10';
            $config['cur_tag_open']  = '<a class=current>';
            $config['cur_tag_close'] = '</a>';
            $config['first_link']    = 'First';
            $config['last_link']     = 'Last';
            $config['next_link']     = 'Next';
            $config['prev_link']     = 'Prev';
            $this->pagination->initialize($config);
            $data['x']    = $pg + 1;
            $data['user'] = $this->Users_model->get_user_list($config['per_page'], $pg);
            $this->load->view('admin/user_view', $data);
        } else {
            redirect('admin/login');
        }
    }

    function user_add(){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin") {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('group', 'Group', 'required');
                //$this->form_validation->set_rules('ans', 'Answer ', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/user_add');
                } else {
                    $postdata['username'] = $this->security->xss_clean($this->input->post('username'));
                    $postdata['password'] = $this->encrypt->encode($this->input->post('password'));
                    $postdata['email']    = $this->security->xss_clean($this->input->post('email'));
                    $postdata['group']    = $this->security->xss_clean($this->input->post('group'));
                    //$postdata['ans'] = $this->security->xss_clean($this->input->post('ans'));
                    //$postdata['usertime'] = date("Y-m-d H:i:s");
                    $postdata['status']   = $this->input->post('status');
                    $result               = $this->Users_model->user_add($postdata);
                    if ($result) { //exit;
                        $this->session->set_flashdata('msg', 'Added Successfully');
                        redirect('create_user/user');
                    } else {
                        $data['msg'] = "Failed to add user";
                        $this->load->view('admin/user_add');
                    }
                }
            } else {
                $this->load->view('admin/user_add');
            }
        } else {
            redirect('admin/login');
        }
    }

    function user_edit($id = 0){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin") {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "") {
                redirect('admin/user');
            } else if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('group', 'Group', 'required');
                //$this->form_validation->set_rules('ans', 'Answer ', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->Users_model->get_user_by_id($id);
                    $this->load->view('admin/user_edit', $data);
                } else {
                    $postdata['username'] = $this->security->xss_clean($this->input->post('username'));
                    $postdata['password'] = $this->encrypt->encode($this->input->post('password'));
                    $postdata['email']    = $this->security->xss_clean($this->input->post('email'));
                    $postdata['group']    = $this->security->xss_clean($this->input->post('group'));
                    $postdata['status']   = $this->input->post('status');
                    //    print_r($postdata);
                    //exit;
                    $result               = $this->Users_model->user_upd($id, $postdata);
                    if ($result) {
                        $this->session->set_flashdata('msg', 'Updated Successfully');
                        redirect('create_user/user');
                    } else {
                        $data['user'] = $this->Users_model->get_user_by_id($id);
                        $data['msg']  = "Failed to update user";
                        $this->load->view('admin/user_edit', $data);
                    }
                }
            } else {
                $data['user'] = $this->Users_model->get_user_by_id($id);
                if (empty($data['user'])) {
                    redirect('admin/user');
                } else {
                    $this->load->view('admin/user_edit', $data);
                }
            }
        } else {
            redirect('admin/login');
        }
    }

    function user_del($id = 0){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin") {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "") {
                redirect('create_user/user');
            } else {
                $result = $this->Users_model->user_user_del($id);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Deleted Successfully');
                    redirect('create_user/user');
                } else {
                    $this->session->set_flashdata('msg', 'Failed to Delete');
                    redirect('create_user/user');
                }
            }
        } else {
            redirect('admin/login');
        }
    }
    
    function deleteip(){
        $this->db->where('status', 1);
        $query = $this->db->delete('admin_ipauth');
        echo "all exiting ip was deleted";
    }

    //-----------------ip authenticate----------------------------------------
    public function save(){
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('group') == "admin")
            redirect('login');
        if ($_POST) {
            $username = $_POST['username'];
            if ($this->users->insert_chk($username) == false)
                $this->users->addUser();
            else
                redirect('create_user/index/Duplicate Username ' . $username);
            redirect('create_user/index/User Created Successfully');
        } else
            redirect('create_user/');
    }


    function user_availability(){
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $sql_check = mysql_query("select id from users where username='" . $username . "'") or die(mysql_error());
            if (mysql_num_rows($sql_check)) {
                echo '<font color="red">This username <STRONG>' . $username . '</STRONG> is already in use</font>';
            } else {
                echo '<font color="green">This username <STRONG>' . $username . '</STRONG> available</font>';
            }
        }
    }

    function email_availability(){
        if (isSet($_POST['email'])) {
            $email = $_POST['email'];
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            // Run the preg_match() function on regex against the email address
            if (preg_match($regex, $email)) {
                $sql_check = mysql_query("select id from users where email='" . $email . "'") or die(mysql_error());
                if (mysql_num_rows($sql_check)) {
                    echo '<font color="red">This email <STRONG>' . $email . '</STRONG> is already in use</font>';
                } else {
                    echo '<font color="green">This email <STRONG>' . $email . '</STRONG> available</font>';
                }
            } else {
                echo '<font color="red">This email <STRONG>' . $email . '</STRONG> is invalid </font>';
            }
        }
    }


    function user_block_list($pg = 0){
        if ($this->access_level != 999)
            redirect('login'); {
            $this->load->library('pagination');
            $config['base_url']      = site_url('create_user/user_block_list');
            $config['total_rows']    = $this->users->get_user_list_count();
            $config['per_page']      = '20';
            $config['cur_tag_open']  = '<a class=current>';
            $config['cur_tag_close'] = '</a>';
            $config['first_link']    = 'First';
            $config['last_link']     = 'Last';
            $config['next_link']     = 'Next';
            $config['prev_link']     = 'Prev';
            $this->pagination->initialize($config);
            $data['x']         = $pg + 1;
            $data['user_info'] = $this->users->get_user_list($config['per_page'], $pg);
            $data['msg']       = $this->uri->segment(3);
            if (isset($_POST['submit'])) {
                $match = trim($this->input->post('subject'));
                $array = array(
                    'id' => $match,
                    'fname' => $match,
                    'address ' => $match,
                    'phone' => $match,
                    'email' => $match,
                    'username' => $match,
                    'GroupName' => $match,
                    'title' => $match,
                    'Zone_Name' => $match,
                    'Branch_Name' => $match
                );
                $this->db->or_like($array, 'both');
                $query             = $this->db->get('users');
                $data['user_info'] = $query->result();
            }
            $this->load->view('admin/view_user_user_block', $data);
        }
    }


    function user_app($id = 0, $status){
        if ($this->access_level != '') {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "") {
                redirect('create_user/user_list');
            } else {
                //$image = $this->Users_model->get_executive_image_by_id($id);
                if ($status == 1) {
                    $result = $this->users->model_block_user($id);
                    //unlink('./executive/'.$image);
                    $this->session->set_flashdata('msg', 'Blocked Successfully');
                    redirect('create_user/user_list');
                } else {
                    $result = $this->users->model_approve_user($id);
                    $this->session->set_flashdata('msg', 'Approved Successfully');
                    redirect('create_user/user_list');
                }
            }
        } else {
            redirect('admin/login');
        }
    }


    function user_report($pg = 0){
        if ($this->access_level != 999)
            redirect('login'); {
            $this->load->library('pagination');
            $config['base_url']      = site_url('create_user/user_report');
            $config['total_rows']    = $this->users->get_user_list_count();
            $config['per_page']      = '20';
            $config['cur_tag_open']  = '<a class=current>';
            $config['cur_tag_close'] = '</a>';
            $config['first_link']    = 'First';
            $config['last_link']     = 'Last';
            $config['next_link']     = 'Next';
            $config['prev_link']     = 'Prev';
            $this->pagination->initialize($config);
            $data['x']         = $pg + 1;
            $data['user_info'] = $this->users->get_user_list($config['per_page'], $pg);
            $data['msg']       = $this->uri->segment(3);
            if (isset($_POST['submit'])) {
                $match = trim($this->input->post('subject'));
                $array = array(
                    'id' => $match,
                    'fname' => $match,
                    'address ' => $match,
                    'phone' => $match,
                    'email' => $match,
                    'username' => $match,
                    'GroupName' => $match,
                    'title' => $match,
                    'Zone_Name' => $match,
                    'Branch_Name' => $match
                );
                $this->db->or_like($array, 'both');
                $query             = $this->db->get('users');
                $data['user_info'] = $query->result();
            }
            $this->load->view('admin/view_user_report', $data);
        }
    }

    public function users_info(){
        if ($this->access_level != 999)
            redirect('login');
        $id           = $this->uri->segment(3);
        $data['info'] = $this->users->model_user_info($id);
        $data['msg']  = $this->uri->segment(3);
        $this->load->view('admin/view_user_info', $data);
    }

    public function user_approve(){
        if ($this->access_level != 999)
            redirect('login');
        $this->users->model_approve_user();
        redirect('create_user/user_block_list/User Active Sucessfully');
    }

    public function user_block(){
        if ($this->access_level != 999)
            redirect('login');
        $this->users->model_block_user();
        redirect('create_user/user_block_list/User Block Sucessfully');
    }

    public function delete_user(){
        if ($this->access_level != 999)
            redirect('login');
        $this->users->model_delete_user();
        redirect('create_user/user_list/User Deleted Sucessfully');
    }
}