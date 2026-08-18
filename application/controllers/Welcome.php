<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Load the URL helper for site_url() function and database library
		$this->load->helper('url');
		$this->load->database();
	}

	public function index()
	{
		$this->load->model('Student_model');
		$data['stats'] = $this->Student_model->get_stats();
		$this->load->view('index', $data);
	}

	public function students()
	{
		// Load the students view
		$this->load->view('students');
	}

	public function privacy_policy()
	{
		// Load the privacy policy view
		$this->load->view('privacy_policy');
	}

	public function terms_conditions()
	{
		// Load the terms and conditions view
		$this->load->view('terms_conditions');
	}

	public function donors()
	{
		$this->load->model('Student_model');
		$this->load->model('Donor_model');

		$data['stats'] = $this->Student_model->get_stats();
		$data['donor_stats'] = $this->Donor_model->get_donor_stats();
		$data['students'] = $this->Student_model->get_all_applications('Pending');
		$data['recent_donors'] = $this->Donor_model->get_recent_donors(12);

		$data['razorpay_key_id'] = $this->Student_model->get_setting('razorpay_key_id', '');
		$data['razorpay_enabled'] = $this->Student_model->get_setting('razorpay_enabled', '1');

		$this->load->view('donors', $data);
	}

	public function donor()
	{
		$this->donors();
	}

	public function verify_razorpay()
	{
		$this->load->model('Donor_model');

		$razorpay_payment_id = $this->input->post('razorpay_payment_id');
		$donor_name          = $this->input->post('donor_name');
		$email               = $this->input->post('email');
		$phone               = $this->input->post('phone');
		$amount              = (float)$this->input->post('amount');
		$student_name        = $this->input->post('student_name') ? $this->input->post('student_name') : 'General Student Fund';
		$pan_number          = $this->input->post('pan_number');
		$message             = $this->input->post('message');

		if (empty($razorpay_payment_id) || empty($donor_name) || $amount <= 0) {
			header('Content-Type: application/json');
			echo json_encode(array('status' => 'error', 'message' => 'Invalid payment verification data.'));
			return;
		}

		$data = array(
			'donor_name'      => $donor_name,
			'email'           => $email,
			'phone'           => $phone,
			'donor_type'      => 'Individual',
			'amount'          => $amount,
			'frequency'       => 'One-Time',
			'student_name'    => $student_name,
			'pan_number'      => $pan_number,
			'message'         => $message,
			'is_anonymous'    => 0,
			'payment_status'  => 'Completed',
			'payment_method'  => 'Razorpay Online',
			'transaction_ref' => $razorpay_payment_id,
			'created_at'      => date('Y-m-d H:i:s')
		);

		$pledge_id = $this->Donor_model->save_pledge($data);

		header('Content-Type: application/json');
		echo json_encode(array(
			'status' => 'success',
			'message' => 'Online Payment Verified Successfully! Ref ID: ' . $razorpay_payment_id,
			'pledge_id' => $pledge_id
		));
	}

	public function save_donor()
	{
		$this->load->model('Donor_model');

		$donor_name   = $this->input->post('donor_name');
		$email        = $this->input->post('email');
		$phone        = $this->input->post('phone');
		$donor_type   = $this->input->post('donor_type') ? $this->input->post('donor_type') : 'Individual';
		$amount       = (float)$this->input->post('amount');
		$frequency    = $this->input->post('frequency') ? $this->input->post('frequency') : 'One-Time';
		$student_id   = $this->input->post('student_id') ? (int)$this->input->post('student_id') : NULL;
		$student_name = $this->input->post('student_name') ? $this->input->post('student_name') : 'General Student Fund';
		$pan_number   = $this->input->post('pan_number');
		$address      = $this->input->post('address');
		$message      = $this->input->post('message');
		$is_anonymous = $this->input->post('is_anonymous') ? 1 : 0;
		$payment_method = $this->input->post('payment_method') ? $this->input->post('payment_method') : 'UPI / Bank Transfer';
		$transaction_ref = $this->input->post('transaction_ref');

		if (empty($donor_name) || empty($email) || empty($phone) || $amount <= 0) {
			header('Content-Type: application/json');
			echo json_encode(array(
				'status' => 'error',
				'message' => 'Please fill in all required fields (Name, Email, Phone, and valid Amount).'
			));
			return;
		}

		$data = array(
			'donor_name'      => $donor_name,
			'email'           => $email,
			'phone'           => $phone,
			'donor_type'      => $donor_type,
			'amount'          => $amount,
			'frequency'       => $frequency,
			'student_id'      => $student_id,
			'student_name'    => $student_name,
			'pan_number'      => $pan_number,
			'address'         => $address,
			'message'         => $message,
			'is_anonymous'    => $is_anonymous,
			'payment_status'  => 'Pledged',
			'payment_method'  => $payment_method,
			'transaction_ref' => $transaction_ref,
			'created_at'      => date('Y-m-d H:i:s')
		);

		$pledge_id = $this->Donor_model->save_pledge($data);

		header('Content-Type: application/json');
		echo json_encode(array(
			'status' => 'success',
			'message' => 'Thank you for your generous pledge! Our trustee team will contact you with 80G tax receipt details.',
			'pledge_id' => $pledge_id
		));
	}

	public function contact()
	{
		// Load the contact view
		$this->load->view('contact');
	}

	public function save_enquiry()
	{
		$data = array(
			'name'    => $this->input->post('name'),
			'email'   => $this->input->post('email'),
			'phone'   => $this->input->post('phone'),
			'message' => $this->input->post('message')
		);
		$this->db->insert('enquiries', $data);
		echo "Enquiry Submitted Successfully. <a href='".site_url('welcome')."'>Go back</a>";
	}

	public function save_application()
	{
		$this->load->model('Student_model');

		$ref_no = 'SS-' . date('Y') . '-' . rand(1000, 9999);

		// Process Uploaded Verification Documents
		$uploaded_docs = array();
		$upload_path = FCPATH . 'uploads/documents/';
		if (!file_exists($upload_path)) {
			@mkdir($upload_path, 0777, true);
		}

		$doc_fields = array(
			'doc_student_photo' => 'Student Photo',
			'doc_aadhaar' => 'Aadhaar / Govt ID',
			'doc_income_certificate' => 'Income Certificate',
			'doc_community_certificate' => 'Community Certificate',
			'doc_marksheets' => 'Academic Mark Sheets',
			'doc_admission_letter' => 'Admission / Offer Letter',
			'doc_fee_structure' => 'College Fee Structure',
			'doc_bonafide' => 'Bonafide Certificate',
			'doc_bank_passbook' => 'Bank Passbook Copy',
			'doc_supporting' => 'Supporting Document'
		);

		foreach ($doc_fields as $field => $label) {
			if (!empty($_FILES[$field]['name'])) {
				$file_name = time() . '_' . rand(100, 999) . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES[$field]['name']);
				$target_file = $upload_path . $file_name;
				if (@move_uploaded_file($_FILES[$field]['tmp_name'], $target_file)) {
					$uploaded_docs[] = array(
						'title' => $label,
						'file_name' => $_FILES[$field]['name'],
						'url' => base_url('uploads/documents/' . $file_name)
					);
				}
			}
		}

		$data = array(
			'ref_no'                 => $ref_no,
			'full_name'              => $this->input->post('full_name'),
			'dob'                    => $this->input->post('dob'),
			'gender'                 => $this->input->post('gender'),
			'mobile'                 => $this->input->post('mobile'),
			'email'                  => $this->input->post('email'),
			'city_district_state'    => $this->input->post('city_district_state'),
			'address'                => $this->input->post('address'),
			'qualification'          => $this->input->post('qualification'),
			'school_college_name'    => $this->input->post('school_college_name'),
			'board_university'       => $this->input->post('board_university'),
			'course_applying'        => $this->input->post('course_applying'),
			'target_college'         => $this->input->post('target_college'),
			'academic_year'          => $this->input->post('academic_year'),
			'marks_cgpa'             => $this->input->post('marks_cgpa'),
			'father_guardian_name'   => $this->input->post('father_guardian_name'),
			'mother_name'            => $this->input->post('mother_name'),
			'occupation'             => $this->input->post('occupation'),
			'family_members_count'   => $this->input->post('family_members_count') ? $this->input->post('family_members_count') : 1,
			'annual_income'          => $this->input->post('annual_income') ? $this->input->post('annual_income') : 0,
			'earning_members_count'  => $this->input->post('earning_members_count') ? $this->input->post('earning_members_count') : 1,
			'financial_description'  => $this->input->post('financial_description'),
			'other_scholarships'     => $this->input->post('other_scholarships'),
			'documents_json'         => !empty($uploaded_docs) ? json_encode($uploaded_docs) : NULL,
			'status'                 => 'Pending',
			'created_at'             => date('Y-m-d H:i:s')
		);

		$insert_id = $this->Student_model->save_application($data);

		header('Content-Type: application/json');
		echo json_encode(array(
			'status' => 'success',
			'message' => 'Scholarship Application Submitted Successfully',
			'ref_no' => $ref_no,
			'id' => $insert_id
		));
	}

	public function check_status()
	{
		$this->load->model('Student_model');
		$ref_no = $this->input->get('ref_no') ? $this->input->get('ref_no') : $this->input->post('ref_no');
		$app = $this->Student_model->get_application_by_ref($ref_no);

		header('Content-Type: application/json');
		if ($app) {
			echo json_encode(array('status' => 'found', 'data' => $app));
		} else {
			echo json_encode(array('status' => 'not_found', 'message' => 'Application Reference Number not found'));
		}
	}
}
