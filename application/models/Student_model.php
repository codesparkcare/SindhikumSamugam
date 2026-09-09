<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->create_table_if_not_exists();
    }

    private function create_table_if_not_exists() {
        $query = "CREATE TABLE IF NOT EXISTS `student_applications` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `ref_no` VARCHAR(50) NOT NULL UNIQUE,
            `full_name` VARCHAR(255) NOT NULL,
            `dob` DATE NULL,
            `gender` VARCHAR(20) NULL,
            `mobile` VARCHAR(20) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `city_district_state` VARCHAR(255) NULL,
            `address` TEXT NULL,
            `parent_contact` VARCHAR(20) NULL,
            `preferred_language` VARCHAR(50) NULL,
            `qualification` VARCHAR(255) NULL,
            `school_college_name` VARCHAR(255) NULL,
            `board_university` VARCHAR(255) NULL,
            `course_applying` VARCHAR(255) NULL,
            `target_college` VARCHAR(255) NULL,
            `academic_year` VARCHAR(50) NULL,
            `marks_cgpa` VARCHAR(50) NULL,
            `admission_status` VARCHAR(50) NULL,
            `annual_tuition_fee` DECIMAL(12,2) DEFAULT 0.00,
            `hostel_required` VARCHAR(10) NULL,
            `is_first_graduate` VARCHAR(10) NULL,
            `career_goal` TEXT NULL,
            `father_guardian_name` VARCHAR(255) NULL,
            `mother_name` VARCHAR(255) NULL,
            `occupation` VARCHAR(255) NULL,
            `father_occupation` VARCHAR(255) NULL,
            `mother_occupation` VARCHAR(255) NULL,
            `family_members_count` INT DEFAULT 1,
            `annual_income` DECIMAL(12,2) DEFAULT 0.00,
            `father_monthly_income` DECIMAL(12,2) DEFAULT 0.00,
            `earning_members_count` INT DEFAULT 1,
            `financial_commitments` TEXT NULL,
            `why_seeking_support` TEXT NULL,
            `required_support_amount` DECIMAL(12,2) DEFAULT 0.00,
            `financial_description` TEXT NULL,
            `other_scholarships` VARCHAR(255) NULL,
            `additional_financial_info` TEXT NULL,
            `documents_json` TEXT NULL,
            `status` VARCHAR(50) DEFAULT 'Pending',
            `admin_remarks` TEXT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($query);

        // Run alter queries for existing table columns if they do not exist
        $cols = array(
            'parent_contact' => "VARCHAR(20) NULL",
            'preferred_language' => "VARCHAR(50) NULL",
            'admission_status' => "VARCHAR(50) NULL",
            'annual_tuition_fee' => "DECIMAL(12,2) DEFAULT 0.00",
            'hostel_required' => "VARCHAR(10) NULL",
            'is_first_graduate' => "VARCHAR(10) NULL",
            'career_goal' => "TEXT NULL",
            'father_occupation' => "VARCHAR(255) NULL",
            'mother_occupation' => "VARCHAR(255) NULL",
            'father_monthly_income' => "DECIMAL(12,2) DEFAULT 0.00",
            'financial_commitments' => "TEXT NULL",
            'why_seeking_support' => "TEXT NULL",
            'required_support_amount' => "DECIMAL(12,2) DEFAULT 0.00",
            'additional_financial_info' => "TEXT NULL"
        );
        foreach ($cols as $col_name => $col_def) {
            $check = $this->db->query("SHOW COLUMNS FROM `student_applications` LIKE '{$col_name}'");
            if ($check && $check->num_rows() == 0) {
                @$this->db->query("ALTER TABLE `student_applications` ADD COLUMN `{$col_name}` {$col_def}");
            }
        }

        $settings_query = "CREATE TABLE IF NOT EXISTS `site_settings` (
            `setting_key` VARCHAR(100) NOT NULL PRIMARY KEY,
            `setting_value` TEXT NULL,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($settings_query);
    }

    public function get_setting($key, $default = null) {
        $this->db->where('setting_key', $key);
        $query = $this->db->get('site_settings');
        if ($query && $row = $query->row()) {
            return $row->setting_value;
        }
        return $default;
    }

    public function set_setting($key, $value) {
        $data = array(
            'setting_key' => $key,
            'setting_value' => $value
        );
        return $this->db->replace('site_settings', $data);
    }

    public function save_application($data) {
        $this->db->insert('student_applications', $data);
        return $this->db->insert_id();
    }

    public function get_all_applications($status = null) {
        if ($status && $status !== 'All') {
            $this->db->where('status', $status);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('student_applications');
        return $query->result_array();
    }

    public function get_application_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('student_applications');
        return $query->row_array();
    }

    public function get_application_by_ref($ref_no) {
        $this->db->where('ref_no', $ref_no);
        $query = $this->db->get('student_applications');
        return $query->row_array();
    }

    public function update_status($id, $status, $remarks = '') {
        $data = array('status' => $status);
        if ($remarks) {
            $data['admin_remarks'] = $remarks;
        }
        $this->db->where('id', $id);
        return $this->db->update('student_applications', $data);
    }

    public function delete_application($id) {
        $this->db->where('id', $id);
        return $this->db->delete('student_applications');
    }

    public function get_stats() {
        $total = $this->db->count_all_results('student_applications');
        
        $this->db->where_in('status', array('Application Received', 'Pending'));
        $pending = $this->db->count_all_results('student_applications');

        $this->db->where('status', 'Under Review');
        $under_review = $this->db->count_all_results('student_applications');

        $this->db->where('status', 'Approved');
        $approved = $this->db->count_all_results('student_applications');

        $this->db->where_in('status', array('Not Approved', 'Rejected'));
        $rejected = $this->db->count_all_results('student_applications');

        // Calculate total fees paid for approved applications
        $this->db->select_sum('annual_income');
        $this->db->where('status', 'Approved');
        $query1 = $this->db->get('student_applications');
        $row1 = $query1->row();
        $fees_paid_db = ($row1 && $row1->annual_income > 0) ? (float)$row1->annual_income : 0;

        // Calculate financial aid needed this month for pending & under review applications
        $this->db->select_sum('annual_income');
        $this->db->where_in('status', array('Application Received', 'Pending', 'Under Review'));
        $query2 = $this->db->get('student_applications');
        $row2 = $query2->row();
        $need_this_month_db = ($row2 && $row2->annual_income > 0) ? (float)$row2->annual_income : 0;

        // Fetch optional site_settings overrides from database
        $custom_pending = $this->get_setting('currently_waiting_students');
        $custom_need = $this->get_setting('need_this_month_amount');
        $custom_total = $this->get_setting('total_applications');
        $custom_approved = $this->get_setting('approved_scholarships');
        $custom_fees = $this->get_setting('fees_paid_amount');

        // Determine final dynamic stats (defaulting to real database counts for 100% transparency)
        $final_pending = ($custom_pending !== null && $custom_pending !== '') ? (int)$custom_pending : $pending;
        $final_need = ($custom_need !== null && $custom_need !== '') ? (float)$custom_need : $need_this_month_db;
        $final_total = ($custom_total !== null && $custom_total !== '') ? (int)$custom_total : $total;
        $final_approved = ($custom_approved !== null && $custom_approved !== '') ? (int)$custom_approved : $approved;
        $final_fees = ($custom_fees !== null && $custom_fees !== '') ? (float)$custom_fees : $fees_paid_db;

        return array(
            'total' => $final_total,
            'pending' => $final_pending,
            'under_review' => $under_review,
            'approved' => $final_approved,
            'rejected' => $rejected,
            'fees_paid' => $final_fees,
            'need_this_month' => $final_need,
            'db_pending_count' => $pending,
            'db_need_sum' => $need_this_month_db,
            'custom_pending' => $custom_pending,
            'custom_need' => $custom_need
        );
    }
    public function get_monthly_analytics($year = null) {
        if (!$year) {
            $year = date('Y');
        }
        
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $analytics = [
            'labels' => [],
            'applications' => [],
            'disbursed' => []
        ];
        
        // Loop through all 12 months.
        for ($i = 1; $i <= 12; $i++) {
            $analytics['labels'][] = $months[$i - 1] . ' ' . $year;
            
            // Applications received
            $this->db->where('YEAR(created_at)', $year);
            $this->db->where('MONTH(created_at)', $i);
            $apps_count = $this->db->count_all_results('student_applications');
            $analytics['applications'][] = $apps_count;
            
            // Disbursed (Approved scholarships count)
            $this->db->where('YEAR(created_at)', $year);
            $this->db->where('MONTH(created_at)', $i);
            $this->db->where('status', 'Approved');
            $disbursed_count = $this->db->count_all_results('student_applications');
            $analytics['disbursed'][] = $disbursed_count;
        }
        
        return $analytics;
    }
}
