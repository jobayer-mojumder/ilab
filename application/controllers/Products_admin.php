<?php
class Products_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Products_admin_model');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('security');
		$this->load->library('encrypt');
		//error_reporting(0);
		
	}

	function index() {
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id') == "") {
			redirect('admin/login');
		} else {
			$this->load->view('admin/welcome');
		}
	}

	/***********************product function**************************/
	function product() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->Products_admin_model->get_product_lists();
			$this->load->view('admin/product/product_view', $data);
		} else {
			redirect('admin/login');
		}
	}

	function product_add() {
		if ($this->session->userdata('admin_id')) {

			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('product_name', 'name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/product/product_add');
				} else {
					$postdata['product_name'] = $this->input->post('product_name');
					$postdata['product_category'] = $this->input->post('product_category');
					$postdata['product_description'] = $this->input->post('product_description');
					$postdata['product_video'] = $this->input->post('product_video');
					$postdata['product_innovator_name'] = $this->input->post('product_innovator_name');
					$postdata['product_cost_tk'] = $this->input->post('product_cost_tk');
					$postdata['product_cost_doller'] = $this->input->post('product_cost_doller');
					$postdata['status'] = $this->input->post('status');

					$config['upload_path'] = './assets/product/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['max_size'] = '300048';
					$config['encrypt_name'] = FALSE;
					$postdata['path'] = $config['upload_path'];

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image1')) {
						$temp = $this->upload->data();
						$postdata['product_image1'] = $temp['file_name'];
					}

					if ($this->upload->do_upload('image2')) {
						$temp = $this->upload->data();
						$postdata['product_image2'] = $temp['file_name'];
					}

					if ($this->upload->do_upload('image3')) {
						$temp = $this->upload->data();
						$postdata['product_innovator_image'] = $temp['file_name'];
					}

					$result = $this->Products_admin_model->product_add($postdata);
					if ($result) {	

						$this->session->set_flashdata('msg', 'Added Successfully');
						redirect('products_admin/product');
					} else {
						$data['msg'] = "Failed to add image";
						$this->load->view('admin/product/product_add');
					}
				}
			} else {
				$this->load->view('admin/product/product_add');
			}
		} else {
			redirect('admin/login');
		}
	}

	function product_edit($id = 0) {
		if ($this->session->userdata('admin_id')) {

			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('products_admin/product');
			} else if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('product_name', 'name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$data['results'] = $this->Products_admin_model->get_product_by_id($id);
					$this->load->view('admin/product/product_edit', $data);
				} else {
					$postdata['product_name'] = $this->input->post('product_name');
					$postdata['product_category'] = $this->input->post('product_category');
					$postdata['product_description'] = $this->input->post('product_description');
					$postdata['product_video'] = $this->input->post('product_video');
					$postdata['product_innovator_name'] = $this->input->post('product_innovator_name');
					$postdata['product_cost_tk'] = $this->input->post('product_cost_tk');
					$postdata['product_cost_doller'] = $this->input->post('product_cost_doller');
					$postdata['status'] = $this->input->post('status');

					$config['upload_path'] = './assets/product/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['max_size'] = '300048';
					$config['encrypt_name'] = FALSE;
					$postdata['path'] = $config['upload_path'];

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('image1')) {
						$temp = $this->upload->data();
						$postdata['product_image1'] = $temp['file_name'];

						$path = $postdata['path'] . $this->input->post('old_image1');
						unlink($path);
					} else if ($this->input->post('image_del1')) {
						$path = $postdata['path'] . $this->input->post('old_image1');
						unlink($path);
						$postdata['product_image1'] = "";
					}

					if ($this->upload->do_upload('image2')) {
						$temp = $this->upload->data();
						$postdata['product_image2'] = $temp['file_name'];

						$path = $postdata['path'] . $this->input->post('old_image2');
						unlink($path);
					} else if ($this->input->post('image_del2')) {
						$path = $postdata['path'] . $this->input->post('old_image2');
						unlink($path);
						$postdata['product_image2'] = "";
					}

					if ($this->upload->do_upload('image3')) {
						$temp = $this->upload->data();
						$postdata['product_innovator_image'] = $temp['file_name'];

						$path = $postdata['path'] . $this->input->post('old_image3');
						unlink($path);
					} else if ($this->input->post('image_del3')) {
						$path = $postdata['path'] . $this->input->post('old_image3');
						unlink($path);
						$postdata['product_innovator_image'] = "";
					}

					$result = $this->Products_admin_model->product_update($id, $postdata);

					if ($result) {

						$this->session->set_flashdata('msg', 'Updated Successfully');
						redirect('products_admin/product');
					} else {
						$data['results'] = $this->Products_admin_model->get_product_by_id($id);
						$data['msg'] = "Failed to update image";
						$this->load->view('admin/product/product_edit', $data);
					}
				}
			} else {
				$data['results'] = $this->Products_admin_model->get_product_by_id($id);

				if (empty($data['results'])) {
					redirect('products_admin/product');
				} else {
					$this->load->view('admin/product/product_edit', $data);
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function product_del($id = 0) {
		if ($this->session->userdata('admin_id')) {

			$id = $this->security->xss_clean($id);
			if ($id == 0 || $id == "") {
				redirect('products_admin/product');
			} else {
				$image = $this->Products_admin_model->get_product_image_by_id($id);

				$result = $this->Products_admin_model->product_del($id);
				$path = './assets/product/';
				if ($result) {

					unlink($path . $image->product_image1);
					unlink($path . $image->product_image2);
					unlink($path . $image->product_innovator_image);
					$this->session->set_flashdata('msg', 'Deleted Successfully');
					redirect('products_admin/product');
				} else {
					$this->session->set_flashdata('msg', 'Failed to Delete');
					redirect('products_admin/product');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	function product_status_change($id = 0, $status = 2) {
		if ($this->session->userdata('admin_id')) {

			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('products_admin/product');
			} else {
				$postdata['status'] = $status;
				$result = $this->Products_admin_model->product_update($id, $postdata);
				if ($result) {

					$this->Products_admin_model->record_add('status', 'Feature Products');

					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('products_admin/product');
				} else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('products_admin/product');
				}
			}
		} else {
			redirect('admin/login');
		}
	}

	/***********************orders function**************************/
	function orders() {
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->Products_admin_model->get_orders_lists();
			$this->load->view('admin/orders/orders_view', $data);
		} else {
			redirect('admin/login');
		}
	}
	
}