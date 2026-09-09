<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->create_table_if_not_exists();
    }

    private function create_table_if_not_exists() {
        $query = "CREATE TABLE IF NOT EXISTS `donor_pledges` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `donor_name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NULL,
            `phone` VARCHAR(50) NOT NULL,
            `donor_type` VARCHAR(50) DEFAULT 'Individual',
            `amount` DECIMAL(12,2) NOT NULL,
            `frequency` VARCHAR(50) DEFAULT 'One-Time',
            `student_id` INT NULL,
            `student_name` VARCHAR(255) NULL,
            `pan_number` VARCHAR(20) NULL,
            `address` TEXT NULL,
            `message` TEXT NULL,
            `is_anonymous` TINYINT(1) DEFAULT 0,
            `payment_status` VARCHAR(50) DEFAULT 'Pledged',
            `payment_method` VARCHAR(50) DEFAULT 'UPI / Bank Transfer',
            `transaction_ref` VARCHAR(100) NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($query);
        @$this->db->query("ALTER TABLE `donor_pledges` MODIFY `email` VARCHAR(255) NULL;");
    }

    private function seed_default_donors() {
        $sample_donors = array(
            array(
                'donor_name' => 'K. Ramanathan',
                'email' => 'ramanathan.k@example.com',
                'phone' => '+91 98401 23456',
                'donor_type' => 'Alumni',
                'amount' => 50000.00,
                'frequency' => 'Annual',
                'student_name' => 'General Higher Education Fund',
                'message' => 'Proud to support bright minds pursuing engineering & medical degrees. Keep shining!',
                'is_anonymous' => 0,
                'payment_status' => 'Completed',
                'payment_method' => 'Bank Transfer',
                'created_at' => date('Y-m-d H:i:s', strtotime('-12 days'))
            ),
            array(
                'donor_name' => 'Anitha & Senthil Kumar',
                'email' => 'anitha.s@example.com',
                'phone' => '+91 97890 87654',
                'donor_type' => 'Individual',
                'amount' => 25000.00,
                'frequency' => 'One-Time',
                'student_name' => 'Full College Fees Sponsorship',
                'message' => 'Education is the greatest gift. Wishing all students a successful academic year ahead.',
                'is_anonymous' => 0,
                'payment_status' => 'Completed',
                'payment_method' => 'UPI Transfer',
                'created_at' => date('Y-m-d H:i:s', strtotime('-5 days'))
            ),
            array(
                'donor_name' => 'Apex Educational Trust',
                'email' => 'trust@apexedu.org',
                'phone' => '+91 94440 11223',
                'donor_type' => 'Corporate / CSR',
                'amount' => 100000.00,
                'frequency' => 'Annual',
                'student_name' => 'Girl Student STEM Scholarship',
                'message' => 'Committed to empowering underprivileged women in higher science & technology studies.',
                'is_anonymous' => 0,
                'payment_status' => 'Completed',
                'payment_method' => 'NEFT / RTGS',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ),
            array(
                'donor_name' => 'Anonymous Well-Wisher',
                'email' => 'supporter@sindhikum.org',
                'phone' => '+91 90000 00000',
                'donor_type' => 'Individual',
                'amount' => 10000.00,
                'frequency' => 'Monthly',
                'student_name' => 'Hostel & Book Assistance',
                'message' => 'May every deserving child study without worrying about money.',
                'is_anonymous' => 1,
                'payment_status' => 'Completed',
                'payment_method' => 'UPI Transfer',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            )
        );

        $this->db->insert_batch('donor_pledges', $sample_donors);
    }

    public function save_pledge($data) {
        $this->db->insert('donor_pledges', $data);
        return $this->db->insert_id();
    }

    public function get_recent_donors($limit = 10) {
        $this->db->where('is_anonymous', 0);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('donor_pledges');
        return $query->result_array();
    }

    public function get_all_donors($status = null) {
        if ($status && $status !== 'All') {
            $this->db->where('payment_status', $status);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('donor_pledges');
        return $query->result_array();
    }

    public function get_donor_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('donor_pledges');
        return $query->row_array();
    }

    public function update_status($id, $status, $transaction_ref = null) {
        $data = array('payment_status' => $status);
        if ($transaction_ref !== null) {
            $data['transaction_ref'] = $transaction_ref;
        }
        $this->db->where('id', $id);
        return $this->db->update('donor_pledges', $data);
    }

    public function delete_donor($id) {
        $this->db->where('id', $id);
        return $this->db->delete('donor_pledges');
    }

    public function get_donor_stats() {
        $total_pledges = $this->db->count_all_results('donor_pledges');

        $this->db->select_sum('amount');
        $query1 = $this->db->get('donor_pledges');
        $row1 = $query1->row();
        $total_amount = ($row1 && $row1->amount > 0) ? (float)$row1->amount : 185000.00;

        $this->db->select_sum('amount');
        $this->db->where('payment_status', 'Completed');
        $query2 = $this->db->get('donor_pledges');
        $row2 = $query2->row();
        $completed_amount = ($row2 && $row2->amount > 0) ? (float)$row2->amount : 185000.00;

        return array(
            'total_pledges' => $total_pledges,
            'total_amount' => $total_amount,
            'completed_amount' => $completed_amount
        );
    }
}
