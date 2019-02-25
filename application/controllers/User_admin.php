<?php
class User_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('User_admin_model');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('security');
		$this->load->library('encrypt');
		//error_reporting(0);

		if ($this->session->userdata('group') !='super_admin') {
			redirect('admin');
		}
		
	}

	function index() {
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id') == "") {
			redirect('admin/login');
		} else {
			$this->load->view('admin/welcome');
		}
	}

	/***********************user function**************************/
	function user() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_user_lists();
			$this->load->view('admin/user/user_view', $data);
		} else {
			redirect('admin/login');
		}
	}

	function user_add() {
		if ($this->session->userdata('admin_id')) {
			$data['groups'] = $this->User_admin_model->get_group_lists_active();
			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('fullname', 'Fullname', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('group', 'Group', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/user/user_add', $data);
				} else {
					$postdata['fullname'] = $this->input->post('fullname');
					$postdata['username'] = $this->security->xss_clean($this->input->post('username'));
					$postdata['password'] = $this->encrypt->encode($this->input->post('password'));
					$postdata['email'] = $this->security->xss_clean($this->input->post('email'));
					$postdata['group'] = $this->security->xss_clean($this->input->post('group'));
					$postdata['status'] = $this->input->post('status');

					$result = $this->User_admin_model->user_add($postdata);
					if ($result) {
						$this->session->set_flashdata('msg', 'Added Successfully');
						redirect('user_admin/user');
					} else {
						$data['msg'] = "Failed to add image";
						$this->load->view('admin/user/user_add', $data);
					}
				}
			} else {
				$this->load->view('admin/user/user_add', $data);
			}
		} else {
			redirect('admin/login');
		}
	}

	function user_edit($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$data['groups'] = $this->User_admin_model->get_group_lists_active();
			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/user');
			} else if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('fullname', 'Fullname', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('group', 'Group', 'required');

				if ($this->form_validation->run() == FALSE) {
					$data['results'] = $this->User_admin_model->get_user_by_id($id);
					$this->load->view('admin/user/user_edit', $data);
				} else {
					$postdata['fullname'] = $this->input->post('fullname');
					$postdata['username'] = $this->security->xss_clean($this->input->post('username'));
					$postdata['email'] = $this->security->xss_clean($this->input->post('email'));
					$postdata['group'] = $this->security->xss_clean($this->input->post('group'));
					$postdata['status'] = $this->input->post('status');

					$result = $this->User_admin_model->user_update($id, $postdata);
					if ($result) {
						$this->session->set_flashdata('msg', 'Updated Successfully');
						redirect('user_admin/user');
					} else {
						$data['results'] = $this->User_admin_model->get_user_by_id($id);
						$data['msg'] = "Failed to update image";
						$this->load->view('admin/user/user_edit', $data);
					}
				}
			} else {
				$data['results'] = $this->User_admin_model->get_user_by_id($id);
				if (empty($data['results'])) {
					redirect('user_admin/user');
				} else {
					$this->load->view('admin/user/user_edit', $data);
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function user_del($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/user');
			} else {
				$result = $this->User_admin_model->user_del($id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Deleted Successfully');
					redirect('user_admin/user');
				} else {
					$this->session->set_flashdata('msg', 'Failed to Delete');
					redirect('user_admin/user');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function user_status_change($id = 0, $status = 2) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('user_admin/user');
			} else {
				$postdata['status'] = $status;
				$result = $this->User_admin_model->user_update($id, $postdata);
				if ($result) {
					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('user_admin/user');
				} else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('user_admin/user');
				}
			}
		} else {
			redirect('admin/login');
		}
	}



	/***********************group function**************************/
	function group() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_group_lists();
			$this->load->view('admin/user/group_view', $data);
		} else {
			redirect('admin/login');
		}
	}

	function group_add() {
		if ($this->session->userdata('admin_id')) {
			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('name', 'Name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/user/group_add');
				} else {
					$postdata['name'] = $this->input->post('name');
					$postdata['status'] = $this->input->post('status');

					$result = $this->User_admin_model->group_add($postdata);
					if ($result) {
						$this->session->set_flashdata('msg', 'Added Successfully');
						redirect('user_admin/group');
					} else {
						$data['msg'] = "Failed to add image";
						$this->load->view('admin/user/group_add');
					}
				}
			} else {
				$this->load->view('admin/user/group_add');
			}
		} else {
			redirect('admin/login');
		}
	}

	function group_edit($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			$data['modules'] = $this->User_admin_model->get_admin_modules();
			$data['access'] = $this->User_admin_model->get_admin_group_access($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/group');
			} else if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('name', 'Name', 'required');

				if ($this->form_validation->run() == FALSE) {
					$data['results'] = $this->User_admin_model->get_group_by_id($id);
					$this->load->view('admin/user/group_edit', $data);
				} else {
					$postdata['name'] = $this->input->post('name');
					$postdata['status'] = $this->input->post('status');
					$module_name = $this->input->post('module_name');

					$access_del = $this->User_admin_model->group_access_del($id);

					if ($access_del) {
						for($i=0;$i < count($module_name);$i++){
							$access['a_group'] = $id;
							$access['a_module'] = $module_name[$i];
							$insert = $this->User_admin_model->group_access_insert($access);
						}
					} else {
						$data['results'] = $this->User_admin_model->get_group_by_id($id);
						$data['msg'] = "Failed to update group";
						$this->load->view('admin/user/group_edit', $data);

					}

					$result = $this->User_admin_model->group_update($id, $postdata);
					if ($result) {
						$this->session->set_flashdata('msg', 'Updated Successfully');
						redirect('user_admin/group');
					} else {
						$data['results'] = $this->User_admin_model->get_group_by_id($id);
						$data['msg'] = "Failed to update group";
						$this->load->view('admin/user/group_edit', $data);
					}
				}
			} else {
				$data['results'] = $this->User_admin_model->get_group_by_id($id);
				if (empty($data['results'])) {
					redirect('user_admin/group');
				} else {
					$this->load->view('admin/user/group_edit', $data);
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function group_del($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/group');
			} else {
				$result = $this->User_admin_model->group_del($id);
				if ($result) {
					$access_del = $this->User_admin_model->group_access_del($id);
					$this->session->set_flashdata('msg', 'Deleted Successfully');
					redirect('user_admin/group');
				} else {
					$this->session->set_flashdata('msg', 'Failed to Delete');
					redirect('user_admin/group');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function group_status_change($id = 0, $status = 2) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('user_admin/group');
			} else {
				$postdata['status'] = $status;
				$result = $this->User_admin_model->group_update($id, $postdata);
				if ($result) {
					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('user_admin/group');
				} else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('user_admin/group');
				}
			}
		} else {
			redirect('admin/login');
		}
	}



	/***********************module function**************************/
	function module() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_module_lists();
			$this->load->view('admin/user/module_view', $data);
		} else {
			redirect('admin/login');
		}
	}

	function module_add() {
		if ($this->session->userdata('admin_id')) {
			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('name', 'Name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/user/module_add');
				} else {
					$postdata['m_name'] = $this->input->post('name');
					$postdata['m_parent'] = $this->input->post('parent');
					$postdata['m_sub'] = $this->input->post('sub');
					$postdata['m_status'] = $this->input->post('status');

					$result = $this->User_admin_model->module_add($postdata);
					if ($result) {
						$this->session->set_flashdata('msg', 'Added Successfully');
						redirect('user_admin/module');
					} else {
						$data['msg'] = "Failed to add image";
						$this->load->view('admin/user/module_add');
					}
				}
			} else {
				$this->load->view('admin/user/module_add');
			}
		} else {
			redirect('admin/login');
		}
	}

	function module_edit($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/module');
			} else if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('name', 'Name', 'required');

				if ($this->form_validation->run() == FALSE) {
					$data['results'] = $this->User_admin_model->get_module_by_id($id);
					$this->load->view('admin/user/module_edit', $data);
				} else {
					$postdata['m_name'] = $this->input->post('name');
					$postdata['m_parent'] = $this->input->post('parent');
					$postdata['m_sub'] = $this->input->post('sub');
					$postdata['m_status'] = $this->input->post('status');

					$result = $this->User_admin_model->module_update($id, $postdata);

					if ($result) {
						$this->session->set_flashdata('msg', 'Updated Successfully');
						redirect('user_admin/module');
					} else {
						$data['results'] = $this->User_admin_model->get_module_by_id($id);
						$data['msg'] = "Failed to update module";
						$this->load->view('admin/user/module_edit', $data);
					}
				}
			} else {
				$data['results'] = $this->User_admin_model->get_module_by_id($id);
				if (empty($data['results'])) {
					redirect('user_admin/module');
				} else {
					$this->load->view('admin/user/module_edit', $data);
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function module_del($id = 0) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('user_admin/module');
			} else {
				$result = $this->User_admin_model->module_del($id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Deleted Successfully');
					redirect('user_admin/module');
				} else {
					$this->session->set_flashdata('msg', 'Failed to Delete');
					redirect('user_admin/module');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function module_status_change($id = 0, $status = 2) {
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('user_admin/module');
			} else {
				$postdata['status'] = $status;
				$result = $this->User_admin_model->module_update($id, $postdata);
				if ($result) {
					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('user_admin/module');
				} else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('user_admin/module');
				}
			}
		} else {
			redirect('admin/login');
		}
	}


	/***********************record function**************************/
	function history() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_history_lists();
			$this->load->view('admin/user/history_view', $data);
		} else {
			redirect('admin/login');
		}
	}
	
	/***********************record function**************************/
	function record() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_record_lists();
			$this->load->view('admin/user/record_view', $data);
		} else {
			redirect('admin/login');
		}
	}
	
	function clear_record() {
		if ($this->session->userdata('admin_id')) {
			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('end', 'END Date', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('msg', 'END date required');
					redirect('user_admin/record');
				} else {
					$start = date("Y-m-d H:i:s", strtotime($this->input->post('start')));
					$end = date("Y-m-d 23:59:29", strtotime($this->input->post('end')));

					$result = $this->User_admin_model->clear_record($start, $end);
					if ($result) {
						$this->session->set_flashdata('msg', 'Cleared Successfully');
						redirect('user_admin/record');
					} else {
						$this->session->set_flashdata('msg', 'Failed to Clear Record');
						redirect('user_admin/record');
					}
				}
			} else {
				redirect('user_admin/history');
			}
		} else {
			redirect('admin/login');
		}
	}


}