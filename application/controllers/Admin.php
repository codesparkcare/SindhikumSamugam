<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Hostel_model');
		$this->load->model('Staff_model');
		$this->load->model('Student_model');
		$this->load->model('Enquiry_model');
	}

	private function _check_auth() {
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
	}

	public function login()
	{
		if ($this->session->userdata('admin_logged_in')) {
			redirect('admin/index');
		}

		if ($this->input->post()) {
			$username = trim($this->input->post('username'));
			$password = trim($this->input->post('password'));

			if (($username === 'admin' || strtolower($username) === 'admin@sindhikum.org') && $password === 'admin123') {
				$this->session->set_userdata('admin_logged_in', TRUE);
				$this->session->set_userdata('admin_username', 'Admin Trustee');
				$this->session->set_flashdata('success', 'Welcome back to the Executive Control Portal!');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('error', 'Invalid username or password credentials.');
				redirect('admin/login');
			}
		}

		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_logged_in');
		$this->session->unset_userdata('admin_username');
		$this->session->set_flashdata('success', 'You have been logged out successfully.');
		redirect('admin/login');
	}

	public function index()
	{
		$this->_check_auth();
		$data['stats'] = $this->Student_model->get_stats();
		$data['applications'] = $this->Student_model->get_all_applications();
		$data['enquiry_stats'] = $this->Enquiry_model->get_stats();
		$data['recent_enquiries'] = $this->Enquiry_model->get_all_enquiries('All', 5);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}

	public function update_site_settings()
	{
		$this->_check_auth();
		if ($this->input->post()) {
			$waiting = $this->input->post('currently_waiting_students');
			$need = $this->input->post('need_this_month_amount');
			
			if ($waiting !== null) {
				$this->Student_model->set_setting('currently_waiting_students', $waiting);
			}
			if ($need !== null) {
				$this->Student_model->set_setting('need_this_month_amount', $need);
			}

			$this->session->set_flashdata('success', 'Database site statistics updated successfully!');
		}
		redirect($this->input->server('HTTP_REFERER') ? $this->input->server('HTTP_REFERER') : 'admin/index');
	}

	public function student_enquiries()
	{
		$this->_check_auth();
		$status = $this->input->get('status') ? $this->input->get('status') : null;
		$data['stats'] = $this->Student_model->get_stats();
		$data['applications'] = $this->Student_model->get_all_applications($status);
		$data['current_filter'] = $status ? $status : 'All';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/student_enquiries', $data);
		$this->load->view('admin/layout/footer');
	}

	public function get_application_details($id)
	{
		$app = $this->Student_model->get_application_by_id($id);
		header('Content-Type: application/json');
		if ($app) {
			echo json_encode(array('status' => 'success', 'data' => $app));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Application not found'));
		}
	}

	public function update_status()
	{
		$this->_check_auth();
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$remarks = $this->input->post('remarks');

		if ($id && $status) {
			$this->Student_model->update_status($id, $status, $remarks);
			$this->session->set_flashdata('success', 'Application status updated to ' . $status);
		} else {
			$this->session->set_flashdata('error', 'Failed to update application status');
		}
		redirect($this->input->server('HTTP_REFERER') ? $this->input->server('HTTP_REFERER') : 'admin/student_enquiries');
	}

	public function delete_application($id)
	{
		$this->_check_auth();
		if ($id) {
			$this->Student_model->delete_application($id);
			$this->session->set_flashdata('success', 'Student scholarship application deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Invalid application ID for deletion.');
		}
		redirect('admin/student_enquiries');
	}

	public function manage_hostels()
	{
		$data['hostels'] = $this->Hostel_model->get_all_hostels();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/manage_hostels', $data);
		$this->load->view('admin/layout/footer');
	}

	public function add_hostel()
	{
		if ($this->input->post()) {
			$data = array(
				'hostel_name' => $this->input->post('hostel_name'),
				'hostel_address' => $this->input->post('hostel_address')
			);
			$this->Hostel_model->add_hostel($data);
			$this->session->set_flashdata('success', 'Hostel added successfully!');
			redirect('admin/manage_hostels');
		}
	}

	public function edit_hostel()
	{
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$data = array(
				'hostel_name' => $this->input->post('hostel_name'),
				'hostel_address' => $this->input->post('hostel_address')
			);
			$this->Hostel_model->update_hostel($id, $data);
			$this->session->set_flashdata('success', 'Hostel updated successfully!');
			redirect('admin/manage_hostels');
		}
	}

	public function delete_hostel($id)
	{
		$this->Hostel_model->delete_hostel($id);
		$this->session->set_flashdata('success', 'Hostel deleted successfully!');
		redirect('admin/manage_hostels');
	}

	// ---------------------------------------------------------
	// STAFF MANAGEMENT
	// ---------------------------------------------------------

	public function manage_staff()
	{
		$data['staff'] = $this->Staff_model->get_all_staff();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/manage_staff', $data);
		$this->load->view('admin/layout/footer');
	}

	public function add_staff()
	{
		if ($this->input->post()) {
			$data = array(
				'staff_name' => $this->input->post('staff_name'),
				'email'      => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'address'    => $this->input->post('address')
			);
			$this->Staff_model->add_staff($data);
			$this->session->set_flashdata('success', 'Staff member added successfully!');
			redirect('admin/manage_staff');
		}
	}

	public function edit_staff()
	{
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$data = array(
				'staff_name' => $this->input->post('staff_name'),
				'email'      => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'address'    => $this->input->post('address')
			);
			$this->Staff_model->update_staff($id, $data);
			$this->session->set_flashdata('success', 'Staff member updated successfully!');
			redirect('admin/manage_staff');
		}
	}

	public function delete_staff($id)
	{
		$this->Staff_model->delete_staff($id);
		$this->session->set_flashdata('success', 'Staff member deleted successfully!');
		redirect('admin/manage_staff');
	}

	// ---------------------------------------------------------
	// DONOR MANAGEMENT
	// ---------------------------------------------------------

	public function manage_donors()
	{
		$this->_check_auth();
		$this->load->model('Donor_model');

		$status = $this->input->get('status') ? $this->input->get('status') : null;
		$data['donors'] = $this->Donor_model->get_all_donors($status);
		$data['donor_stats'] = $this->Donor_model->get_donor_stats();
		$data['current_filter'] = $status ? $status : 'All';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/manage_donors', $data);
		$this->load->view('admin/layout/footer');
	}

	public function update_donor_status()
	{
		$this->_check_auth();
		$this->load->model('Donor_model');

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$ref = $this->input->post('transaction_ref');

		if ($id && $status) {
			$this->Donor_model->update_status($id, $status, $ref);
			$this->session->set_flashdata('success', 'Donor pledge status updated to ' . $status);
		} else {
			$this->session->set_flashdata('error', 'Failed to update donor pledge status.');
		}
		redirect($this->input->server('HTTP_REFERER') ? $this->input->server('HTTP_REFERER') : 'admin/manage_donors');
	}

	public function delete_donor($id)
	{
		$this->_check_auth();
		$this->load->model('Donor_model');
		if ($id) {
			$this->Donor_model->delete_donor($id);
			$this->session->set_flashdata('success', 'Donor pledge record deleted.');
		}
		redirect('admin/manage_donors');
	}

	// ---------------------------------------------------------
	// SETTINGS MANAGEMENT (RAZORPAY & EMAIL)
	// ---------------------------------------------------------

	public function settings()
	{
		$this->_check_auth();

		$setting_keys = array(
			'razorpay_enabled', 'razorpay_environment', 'razorpay_key_id', 'razorpay_key_secret', 'razorpay_webhook_secret',
			'email_enabled', 'smtp_host', 'smtp_port', 'smtp_crypto', 'smtp_user', 'smtp_pass', 'mail_from_name', 'mail_from_address', 'admin_notification_email',
			'currently_waiting_students', 'need_this_month_amount'
		);

		$settings = array();
		foreach ($setting_keys as $key) {
			$settings[$key] = $this->Student_model->get_setting($key, '');
		}

		$data['settings'] = $settings;

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/settings', $data);
		$this->load->view('admin/layout/footer');
	}

	public function save_settings()
	{
		$this->_check_auth();

		if ($this->input->post()) {
			$fields = array(
				'razorpay_enabled', 'razorpay_environment', 'razorpay_key_id', 'razorpay_key_secret', 'razorpay_webhook_secret',
				'email_enabled', 'smtp_host', 'smtp_port', 'smtp_crypto', 'smtp_user', 'smtp_pass', 'mail_from_name', 'mail_from_address', 'admin_notification_email',
				'currently_waiting_students', 'need_this_month_amount'
			);

			foreach ($fields as $field) {
				$val = $this->input->post($field);
				if ($field === 'razorpay_enabled' || $field === 'email_enabled') {
					$val = ($val !== null && $val !== '') ? '1' : '0';
				}
				if ($val !== null) {
					$this->Student_model->set_setting($field, trim($val));
				}
			}

			$this->session->set_flashdata('success', 'Razorpay & Email system settings saved successfully!');
		}

		redirect('admin/settings');
	}

	public function send_test_email()
	{
		$this->_check_auth();

		$to_email = $this->input->post('test_email');
		if (empty($to_email) || !filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
			header('Content-Type: application/json');
			echo json_encode(array('status' => 'error', 'message' => 'Please enter a valid recipient email address.'));
			return;
		}

		$smtp_host   = $this->Student_model->get_setting('smtp_host');
		$smtp_port   = $this->Student_model->get_setting('smtp_port', '587');
		$smtp_crypto = $this->Student_model->get_setting('smtp_crypto', 'tls');
		$smtp_user   = $this->Student_model->get_setting('smtp_user');
		$smtp_pass   = $this->Student_model->get_setting('smtp_pass');
		$from_name   = $this->Student_model->get_setting('mail_from_name', 'Sindhikum Samugam');
		$from_address= $this->Student_model->get_setting('mail_from_address', 'noreply@sindhikum.org');

		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => $smtp_host,
			'smtp_port' => (int)$smtp_port,
			'smtp_user' => $smtp_user,
			'smtp_pass' => $smtp_pass,
			'smtp_crypto' => $smtp_crypto,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		);

		$this->load->library('email');
		$this->email->initialize($config);

		$this->email->from($from_address ? $from_address : 'noreply@sindhikum.org', $from_name);
		$this->email->to($to_email);
		$this->email->subject('Test Email from Sindhikum Samugam Admin Portal');
		$this->email->message('<h2>SMTP Configuration Test</h2><p>This is a test email sent from the Sindhikum Samugam Admin Dashboard to confirm that your SMTP server settings are correctly configured.</p><p><strong>Sent at:</strong> ' . date('d M Y, h:i A') . '</p>');

		header('Content-Type: application/json');
		if (@$this->email->send()) {
			echo json_encode(array('status' => 'success', 'message' => 'Test email successfully sent to ' . htmlspecialchars($to_email)));
		} else {
			$debugger = $this->email->print_debugger(array('headers'));
			echo json_encode(array('status' => 'error', 'message' => 'Failed to send email. Check SMTP server details.', 'debug' => strip_tags($debugger)));
		}
	}

	// ---------------------------------------------------------
	// CONTACT FORM ENQUIRIES MANAGEMENT
	// ---------------------------------------------------------

	public function contact_enquiries()
	{
		$this->_check_auth();
		$status = $this->input->get('status') ? $this->input->get('status') : null;
		$data['stats'] = $this->Enquiry_model->get_stats();
		$data['enquiries'] = $this->Enquiry_model->get_all_enquiries($status);
		$data['current_filter'] = $status ? $status : 'All';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/contact_enquiries', $data);
		$this->load->view('admin/layout/footer');
	}

	public function get_enquiry_details($id)
	{
		$this->_check_auth();
		$enquiry = $this->Enquiry_model->get_enquiry_by_id($id);
		header('Content-Type: application/json');
		if ($enquiry) {
			echo json_encode(array('status' => 'success', 'data' => $enquiry));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Enquiry not found'));
		}
	}

	public function update_enquiry_status()
	{
		$this->_check_auth();
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$remarks = $this->input->post('admin_notes');

		if ($id && $status) {
			$this->Enquiry_model->update_status($id, $status, $remarks);
			$this->session->set_flashdata('success', 'Enquiry status updated to ' . $status);
		} else {
			$this->session->set_flashdata('error', 'Failed to update enquiry status.');
		}
		redirect($this->input->server('HTTP_REFERER') ? $this->input->server('HTTP_REFERER') : 'admin/contact_enquiries');
	}

	public function delete_enquiry($id)
	{
		$this->_check_auth();
		if ($id) {
			$this->Enquiry_model->delete_enquiry($id);
			$this->session->set_flashdata('success', 'Contact form enquiry deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Invalid enquiry ID.');
		}
		redirect('admin/contact_enquiries');
	}
}
