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

	public function mission()
	{
		// Load the mission view
		$this->load->view('mission');
	}

	public function our_mission()
	{
		$this->mission();
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

		// Send email confirmation if donor provided an email address
		if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->_send_donor_pledge_email($data, $pledge_id);
		}

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

		if (empty($donor_name) || empty($phone) || $amount <= 0) {
			header('Content-Type: application/json');
			echo json_encode(array(
				'status' => 'error',
				'message' => 'Please fill in all required fields (Name, Phone, and valid Amount).'
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

		// Send email confirmation if donor provided an email address
		if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->_send_donor_pledge_email($data, $pledge_id);
		}

		header('Content-Type: application/json');
		echo json_encode(array(
			'status' => 'success',
			'message' => 'Thank you for your generous pledge! Our trustee team will contact you soon.',
			'pledge_id' => $pledge_id
		));
	}

	private function _send_donor_pledge_email($donor_data, $pledge_id)
	{
		$this->load->model('Student_model');

		$email_enabled = $this->Student_model->get_setting('email_enabled', '1');
		if ($email_enabled === '0' || $email_enabled === false) {
			return false;
		}

		$smtp_host    = $this->Student_model->get_setting('smtp_host');
		$smtp_port    = $this->Student_model->get_setting('smtp_port', '587');
		$smtp_crypto  = $this->Student_model->get_setting('smtp_crypto', 'tls');
		$smtp_user    = $this->Student_model->get_setting('smtp_user');
		$smtp_pass    = $this->Student_model->get_setting('smtp_pass');
		$from_name    = $this->Student_model->get_setting('mail_from_name', 'Sindhikum Samugam Educational Trust');
		$from_address = $this->Student_model->get_setting('mail_from_address', 'noreply@sindhikum.org');

		if (empty($smtp_host)) {
			return false;
		}

		$config = array(
			'protocol'    => 'smtp',
			'smtp_host'   => $smtp_host,
			'smtp_port'   => (int)$smtp_port,
			'smtp_user'   => $smtp_user,
			'smtp_pass'   => $smtp_pass,
			'smtp_crypto' => $smtp_crypto,
			'mailtype'    => 'html',
			'charset'     => 'utf-8',
			'newline'     => "\r\n",
			'crlf'        => "\r\n"
		);

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->clear(TRUE);

		$this->email->from($from_address ? $from_address : 'noreply@sindhikum.org', $from_name);
		$this->email->to($donor_data['email']);

		// Optionally BCC admin if notification email is configured
		$admin_email = $this->Student_model->get_setting('admin_notification_email');
		if (!empty($admin_email) && filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
			$this->email->bcc($admin_email);
		}

		$donor_name   = htmlspecialchars($donor_data['donor_name']);
		$amount_fmt   = number_format($donor_data['amount']);
		$student_name = htmlspecialchars(!empty($donor_data['student_name']) ? $donor_data['student_name'] : 'General Student Fund');
		$frequency    = htmlspecialchars(!empty($donor_data['frequency']) ? $donor_data['frequency'] : 'One-Time');
		$pledge_ref   = 'SS-DON-' . str_pad($pledge_id, 5, '0', STR_PAD_LEFT);
		$date_str     = date('d M Y, h:i A');
		$is_completed = (isset($donor_data['payment_status']) && $donor_data['payment_status'] === 'Completed');

		$subject = $is_completed 
			? 'Donation Receipt & Confirmation - Sindhikum Samugam'
			: 'Donation Pledge Acknowledged - Sindhikum Samugam';
		$this->email->subject($subject);

		$notice_html = $is_completed
			? '<div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; border-left: 5px solid #059669; padding: 18px 22px; border-radius: 10px; margin: 24px 0;">
					<p style="margin: 0; color: #065f46; font-size: 15px; font-weight: 700; line-height: 1.6;">
						Your online donation payment has been verified and completed successfully! Thank you for your generous contribution.
					</p>
			   </div>'
			: '<div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; border-left: 5px solid #059669; padding: 18px 22px; border-radius: 10px; margin: 24px 0;">
					<p style="margin: 0; color: #065f46; font-size: 15px; font-weight: 700; line-height: 1.6;">
						We\'ve got your donation notification—thank you! We will send an official confirmation once the payment clears. Keep an eye out for a quick call from our team to update you on your payment status.
					</p>
			   </div>';

		$status_label = $is_completed
			? '<span style="color: #059669; font-weight: 700;">Completed &amp; Verified</span>'
			: '<span style="color: #d97706; font-weight: 700;">Pledged (Pending Verification)</span>';

		$message_body = '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>' . $subject . '</title>
		</head>
		<body style="font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; margin: 0; padding: 24px 12px; color: #1e293b;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
				<!-- Header -->
				<tr>
					<td style="background: linear-gradient(135deg, #065f46 0%, #047857 100%); padding: 32px 24px; text-align: center; color: #ffffff;">
						<h1 style="margin: 0; font-size: 22px; font-weight: 800; letter-spacing: -0.02em;">Sindhikum Samugam Educational Trust</h1>
						<p style="margin: 6px 0 0 0; font-size: 14px; opacity: 0.9;">Empowering Underprivileged Students Through Education</p>
					</td>
				</tr>

				<!-- Main Content -->
				<tr>
					<td style="padding: 32px 24px;">
						<h2 style="margin: 0 0 16px 0; font-size: 18px; color: #0f172a;">Dear ' . $donor_name . ',</h2>
						<p style="margin: 0 0 16px 0; font-size: 15px; line-height: 1.6; color: #334155;">
							Thank you for your noble commitment and generosity in supporting student education. We have received your contribution details.
						</p>

						' . $notice_html . '

						<!-- Pledge Details Table -->
						<h3 style="margin: 24px 0 12px 0; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b;">Contribution Details</h3>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; font-size: 14px; margin-bottom: 24px;">
							<tr>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; color: #64748b; width: 40%;">Reference ID</td>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; font-weight: 700; color: #0f172a;">' . $pledge_ref . '</td>
							</tr>
							<tr>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; color: #64748b;">Amount</td>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; font-weight: 800; color: #059669; font-size: 16px;">₹' . $amount_fmt . ' <span style="font-size: 12px; font-weight: 500; color: #64748b;">(' . $frequency . ')</span></td>
							</tr>
							<tr>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; color: #64748b;">Target Student / Cause</td>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; font-weight: 600; color: #0f172a;">' . $student_name . '</td>
							</tr>
							<tr>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0; color: #64748b;">Status</td>
								<td style="padding: 12px 16px; border-bottom: 1px solid #e2e8f0;">' . $status_label . '</td>
							</tr>
							<tr>
								<td style="padding: 12px 16px; color: #64748b;">Date &amp; Time</td>
								<td style="padding: 12px 16px; color: #0f172a;">' . $date_str . '</td>
							</tr>
						</table>

						<!-- Bank Account & UPI Details Box (Shown for pledges) -->
						' . (!$is_completed ? '
						<div style="background: #0f172a; color: #ffffff; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
							<div style="font-size: 12px; font-weight: 700; color: #34d399; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.05em;">Official Trust Bank &amp; UPI Details</div>
							<p style="font-size: 13px; color: #cbd5e1; margin: 0 0 12px 0; line-height: 1.5;">If completing your donation via Bank Transfer or UPI, please use the following official details:</p>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 13px; color: #ffffff;">
								<tr>
									<td style="padding: 4px 0; color: #94a3b8; width: 40%;">Account Name:</td>
									<td style="padding: 4px 0; font-weight: 700;">SINDHIKUM SAMUGAM FOUNDATION</td>
								</tr>
								<tr>
									<td style="padding: 4px 0; color: #94a3b8;">Bank Name:</td>
									<td style="padding: 4px 0; font-weight: 700;">IndusInd Bank</td>
								</tr>
								<tr>
									<td style="padding: 4px 0; color: #94a3b8;">Account Number:</td>
									<td style="padding: 4px 0; font-weight: 700; font-family: monospace; letter-spacing: 0.05em; color: #34d399;">201037769340</td>
								</tr>
								<tr>
									<td style="padding: 4px 0; color: #94a3b8;">UPI ID:</td>
									<td style="padding: 4px 0; font-weight: 700; color: #38bdf8;">pos.5373064@indus</td>
								</tr>
							</table>
						</div>' : '') . '

						<p style="margin: 0; font-size: 14px; line-height: 1.6; color: #475569;">
							Every single contribution directly impacts the academic dreams of deserving students. We sincerely appreciate your support.
						</p>
					</td>
				</tr>

				<!-- Footer -->
				<tr>
					<td style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 24px; text-align: center; font-size: 12px; color: #64748b;">
						<p style="margin: 0 0 6px 0; font-weight: 700; color: #334155;">Sindhikum Samugam Educational Trust</p>
						<p style="margin: 0; font-size: 11px; color: #94a3b8;">This is an automated notification. Our team will contact you shortly.</p>
					</td>
				</tr>
			</table>
		</body>
		</html>';

		$this->email->message($message_body);

		return @$this->email->send();
	}

	public function contact()
	{
		// Load the contact view
		$this->load->view('contact');
	}

	public function save_enquiry()
	{
		$this->load->model('Enquiry_model');
		$name    = trim($this->input->post('name'));
		$email   = trim($this->input->post('email'));
		$phone   = trim($this->input->post('phone'));
		$message = trim($this->input->post('message'));

		$clean_phone = preg_replace('/[^0-9]/', '', $phone);

		if (empty($name) || empty($phone) || empty($message)) {
			$this->session->set_flashdata('error', 'Please fill in all required enquiry fields (Name, Mobile Number, Message).');
		} else if (strlen($clean_phone) < 10 || strlen($clean_phone) > 12) {
			$this->session->set_flashdata('error', 'Please enter a valid mobile number (10 to 12 digits).');
		} else {
			$data = array(
				'name'    => $name,
				'email'   => $email,
				'phone'   => $phone,
				'message' => $message,
				'status'  => 'New'
			);
			$this->Enquiry_model->add_enquiry($data);
			$this->session->set_flashdata('success', 'Thank you! Your enquiry has been received successfully. Our team will contact you shortly.');
		}
		redirect($this->input->server('HTTP_REFERER') ? $this->input->server('HTTP_REFERER') : 'welcome/contact');
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
			'doc_gov_id' => 'Government ID',
			'doc_aadhaar' => 'Aadhaar / Govt ID',
			'doc_income_certificate' => 'Income Certificate',
			'doc_community_certificate' => 'Community Certificate',
			'doc_marksheets' => 'Academic Mark Sheets',
			'doc_admission_letter' => 'Admission / Offer Letter',
			'doc_fee_structure' => 'College Fee Structure',
			'doc_bonafide' => 'Bonafide Certificate',
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
			'ref_no'                    => $ref_no,
			'full_name'                 => $this->input->post('full_name'),
			'dob'                       => $this->input->post('dob'),
			'gender'                    => $this->input->post('gender'),
			'mobile'                    => $this->input->post('mobile'),
			'email'                     => $this->input->post('email'),
			'city_district_state'       => $this->input->post('city_district_state'),
			'address'                   => $this->input->post('address'),
			'parent_contact'            => $this->input->post('parent_contact'),
			'preferred_language'       => $this->input->post('preferred_language'),
			'qualification'             => $this->input->post('qualification'),
			'school_college_name'       => $this->input->post('school_college_name'),
			'board_university'          => $this->input->post('board_university'),
			'course_applying'           => $this->input->post('course_applying'),
			'target_college'            => $this->input->post('target_college'),
			'academic_year'             => $this->input->post('academic_year'),
			'marks_cgpa'                => $this->input->post('marks_cgpa'),
			'admission_status'          => $this->input->post('admission_status'),
			'annual_tuition_fee'        => $this->input->post('annual_tuition_fee') ? (float)$this->input->post('annual_tuition_fee') : 0.00,
			'hostel_required'           => $this->input->post('hostel_required'),
			'is_first_graduate'         => $this->input->post('is_first_graduate'),
			'career_goal'               => $this->input->post('career_goal'),
			'father_guardian_name'      => $this->input->post('father_guardian_name'),
			'mother_name'               => $this->input->post('mother_name'),
			'occupation'                => $this->input->post('father_occupation') ? $this->input->post('father_occupation') : $this->input->post('occupation'),
			'father_occupation'         => $this->input->post('father_occupation'),
			'mother_occupation'         => $this->input->post('mother_occupation'),
			'family_members_count'      => $this->input->post('family_members_count') ? $this->input->post('family_members_count') : 1,
			'annual_income'             => $this->input->post('annual_income') ? $this->input->post('annual_income') : 0,
			'father_monthly_income'     => $this->input->post('father_monthly_income') ? (float)$this->input->post('father_monthly_income') : 0.00,
			'earning_members_count'     => $this->input->post('earning_members_count') ? $this->input->post('earning_members_count') : 1,
			'financial_commitments'     => $this->input->post('financial_commitments'),
			'why_seeking_support'       => $this->input->post('why_seeking_support'),
			'required_support_amount'   => $this->input->post('required_support_amount') ? (float)$this->input->post('required_support_amount') : 0.00,
			'financial_description'     => $this->input->post('why_seeking_support') ? $this->input->post('why_seeking_support') : $this->input->post('financial_description'),
			'other_scholarships'        => $this->input->post('other_scholarships'),
			'additional_financial_info' => $this->input->post('additional_financial_info'),
			'documents_json'            => !empty($uploaded_docs) ? json_encode($uploaded_docs) : NULL,
			'status'                    => 'Application Received',
			'created_at'                => date('Y-m-d H:i:s')
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
