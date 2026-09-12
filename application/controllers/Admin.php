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
		$data['monthly_analytics'] = $this->Student_model->get_monthly_analytics();

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
		$status    = $this->input->get('status') ? $this->input->get('status') : null;
		$date_from = $this->input->get('date_from') ? $this->input->get('date_from') : null;
		$date_to   = $this->input->get('date_to') ? $this->input->get('date_to') : null;

		$data['stats']          = $this->Student_model->get_stats();
		$data['applications']   = $this->Student_model->get_all_applications($status, $date_from, $date_to);
		$data['current_filter'] = $status ? $status : 'All';
		$data['date_from']      = $date_from;
		$data['date_to']        = $date_to;

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

	// ---------------------------------------------------------
	// EXCEL EXPORT METHODS (CSV for Excel Compatibility)
	// ---------------------------------------------------------

	public function export_students_excel()
	{
		$this->_check_auth();
		$status    = $this->input->get('status');
		$date_from = $this->input->get('date_from');
		$date_to   = $this->input->get('date_to');

		if ($status && $status !== 'All') {
			$this->db->where('status', $status);
		}
		if ($date_from && $date_from !== '') {
			$this->db->where('DATE(created_at) >=', $date_from);
		}
		if ($date_to && $date_to !== '') {
			$this->db->where('DATE(created_at) <=', $date_to);
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('student_applications');
		$data  = $query->result_array();

		$filename = 'Students_Export_' . date('Y-m-d') . '.csv';
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Pragma: no-cache');
		header('Expires: 0');

		$output = fopen('php://output', 'w');
		// BOM for Excel UTF-8 recognition
		fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

		// Row 1: Grouping by 3 Main Sections: Basic Details, Education, Family & Circumstances
		fputcsv($output, array(
			// Application Info (3 columns)
			'APPLICATION INFO', '', '',
			// Section 1: Basic Details (9 columns)
			'BASIC DETAILS', '', '', '', '', '', '', '', '',
			// Section 2: Education (12 columns)
			'EDUCATION', '', '', '', '', '', '', '', '', '', '', '',
			// Section 3: Family & Circumstances (13 columns)
			'FAMILY & CIRCUMSTANCES', '', '', '', '', '', '', '', '', '', '', '', '',
			// Admin Audit Note (1 column)
			'ADMIN AUDIT'
		));

		// Row 2: Detailed Column Headers under each section
		fputcsv($output, array(
			// Application Info
			'Ref No',
			'Application Status',
			'Submitted Date',

			// Section 1: Basic Details
			'[Basic Details] Full Name',
			'[Basic Details] Date of Birth',
			'[Basic Details] Gender',
			'[Basic Details] Mobile Number',
			'[Basic Details] Email Address',
			'[Basic Details] City / District / State',
			'[Basic Details] Residential Address',
			'[Basic Details] Parent Contact Number',
			'[Basic Details] Preferred Language',

			// Section 2: Education
			'[Education] Current / Last Qualification',
			'[Education] School / College Name',
			'[Education] Board / University',
			'[Education] Course Applying For',
			'[Education] Target College / University',
			'[Education] Academic Year',
			'[Education] Marks / Percentage / CGPA',
			'[Education] Admission Status',
			'[Education] Annual Tuition Fee (INR)',
			'[Education] Hostel Required',
			'[Education] First Graduate',
			'[Education] Career Goal',

			// Section 3: Family & Circumstances
			'[Family & Circumstances] Father / Guardian Name',
			'[Family & Circumstances] Mother Name',
			'[Family & Circumstances] Father / Guardian Occupation',
			'[Family & Circumstances] Mother Occupation',
			'[Family & Circumstances] Family Members Count',
			'[Family & Circumstances] Earning Members Count',
			'[Family & Circumstances] Annual Family Income (INR)',
			'[Family & Circumstances] Father Monthly Income (INR)',
			'[Family & Circumstances] Required Support Amount (INR)',
			'[Family & Circumstances] Family Financial Commitments',
			'[Family & Circumstances] Why Seeking Support',
			'[Family & Circumstances] Other Scholarships Received',
			'[Family & Circumstances] Circumstances & Financial Need Info',

			// Admin Audit
			'Admin Remarks / Audit Note'
		));

		foreach ($data as $row) {
			$father_occ = !empty($row['father_occupation']) ? $row['father_occupation'] : (isset($row['occupation']) ? $row['occupation'] : '');
			$circ_info  = !empty($row['additional_financial_info']) ? $row['additional_financial_info'] : (isset($row['financial_description']) ? $row['financial_description'] : '');

			fputcsv($output, array(
				// Application Info
				isset($row['ref_no']) ? $row['ref_no'] : '',
				isset($row['status']) ? $row['status'] : '',
				isset($row['created_at']) && !empty($row['created_at']) ? date('d-m-Y H:i', strtotime($row['created_at'])) : '',

				// Section 1: Basic Details
				isset($row['full_name']) ? $row['full_name'] : '',
				isset($row['dob']) ? $row['dob'] : '',
				isset($row['gender']) ? $row['gender'] : '',
				isset($row['mobile']) ? $row['mobile'] : '',
				isset($row['email']) ? $row['email'] : '',
				isset($row['city_district_state']) ? $row['city_district_state'] : '',
				isset($row['address']) ? $row['address'] : '',
				isset($row['parent_contact']) ? $row['parent_contact'] : '',
				isset($row['preferred_language']) ? $row['preferred_language'] : '',

				// Section 2: Education
				isset($row['qualification']) ? $row['qualification'] : '',
				isset($row['school_college_name']) ? $row['school_college_name'] : '',
				isset($row['board_university']) ? $row['board_university'] : '',
				isset($row['course_applying']) ? $row['course_applying'] : '',
				isset($row['target_college']) ? $row['target_college'] : '',
				isset($row['academic_year']) ? $row['academic_year'] : '',
				isset($row['marks_cgpa']) ? $row['marks_cgpa'] : '',
				isset($row['admission_status']) ? $row['admission_status'] : '',
				isset($row['annual_tuition_fee']) ? $row['annual_tuition_fee'] : '0.00',
				isset($row['hostel_required']) ? $row['hostel_required'] : '',
				isset($row['is_first_graduate']) ? $row['is_first_graduate'] : '',
				isset($row['career_goal']) ? $row['career_goal'] : '',

				// Section 3: Family & Circumstances
				isset($row['father_guardian_name']) ? $row['father_guardian_name'] : '',
				isset($row['mother_name']) ? $row['mother_name'] : '',
				$father_occ,
				isset($row['mother_occupation']) ? $row['mother_occupation'] : '',
				isset($row['family_members_count']) ? $row['family_members_count'] : '1',
				isset($row['earning_members_count']) ? $row['earning_members_count'] : '1',
				isset($row['annual_income']) ? $row['annual_income'] : '0.00',
				isset($row['father_monthly_income']) ? $row['father_monthly_income'] : '0.00',
				isset($row['required_support_amount']) ? $row['required_support_amount'] : '0.00',
				isset($row['financial_commitments']) ? $row['financial_commitments'] : '',
				isset($row['why_seeking_support']) ? $row['why_seeking_support'] : '',
				isset($row['other_scholarships']) ? $row['other_scholarships'] : '',
				$circ_info,

				// Admin Audit
				isset($row['admin_remarks']) ? $row['admin_remarks'] : ''
			));
		}
		fclose($output);
		exit;
	}

	public function export_donors_excel()
	{
		$this->_check_auth();
		$this->load->model('Donor_model');
		$date_from = $this->input->get('date_from');
		$date_to   = $this->input->get('date_to');

		if ($date_from && $date_from !== '') {
			$this->db->where('DATE(created_at) >=', $date_from);
		}
		if ($date_to && $date_to !== '') {
			$this->db->where('DATE(created_at) <=', $date_to);
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('donor_pledges');
		$data  = $query->result_array();

		$filename = 'Donors_Export_' . date('Y-m-d') . '.csv';
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Pragma: no-cache');
		header('Expires: 0');

		$output = fopen('php://output', 'w');
		fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

		fputcsv($output, array(
			'ID', 'Donor Name', 'Donor Type', 'Email', 'Phone',
			'Amount (₹)', 'Frequency', 'Student / Fund Target',
			'PAN Number', 'Payment Status', 'Transaction Ref', 'Date'
		));

		foreach ($data as $row) {
			fputcsv($output, array(
				$row['id'],
				isset($row['donor_name']) ? $row['donor_name'] : '',
				isset($row['donor_type']) ? $row['donor_type'] : '',
				isset($row['email']) ? $row['email'] : '',
				isset($row['phone']) ? $row['phone'] : '',
				isset($row['amount']) ? $row['amount'] : '',
				isset($row['frequency']) ? $row['frequency'] : '',
				isset($row['student_name']) ? $row['student_name'] : 'General Fund',
				isset($row['pan_number']) ? $row['pan_number'] : '',
				isset($row['payment_status']) ? $row['payment_status'] : '',
				isset($row['transaction_ref']) ? $row['transaction_ref'] : '',
				isset($row['created_at']) ? date('d-m-Y H:i', strtotime($row['created_at'])) : ''
			));
		}
		fclose($output);
		exit;
	}

	public function export_contacts_excel()
	{
		$this->_check_auth();
		$date_from = $this->input->get('date_from');
		$date_to   = $this->input->get('date_to');

		if ($date_from && $date_from !== '') {
			$this->db->where('DATE(created_at) >=', $date_from);
		}
		if ($date_to && $date_to !== '') {
			$this->db->where('DATE(created_at) <=', $date_to);
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('enquiries');
		$data  = $query->result_array();

		$filename = 'Contact_Enquiries_Export_' . date('Y-m-d') . '.csv';
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Pragma: no-cache');
		header('Expires: 0');

		$output = fopen('php://output', 'w');
		fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

		fputcsv($output, array(
			'ID', 'Name', 'Email', 'Phone', 'Message', 'Status', 'Admin Notes', 'Date Received'
		));

		foreach ($data as $row) {
			fputcsv($output, array(
				$row['id'],
				isset($row['name']) ? $row['name'] : '',
				isset($row['email']) ? $row['email'] : '',
				isset($row['phone']) ? $row['phone'] : '',
				isset($row['message']) ? $row['message'] : '',
				isset($row['status']) ? $row['status'] : '',
				isset($row['admin_notes']) ? $row['admin_notes'] : '',
				isset($row['created_at']) ? date('d-m-Y H:i', strtotime($row['created_at'])) : ''
			));
		}
		fclose($output);
		exit;
	}
}
