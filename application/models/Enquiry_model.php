<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->create_table_if_not_exists();
    }

    private function create_table_if_not_exists() {
        $query = "CREATE TABLE IF NOT EXISTS `enquiries` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NULL,
            `phone` VARCHAR(50) NOT NULL,
            `message` TEXT NOT NULL,
            `status` VARCHAR(50) DEFAULT 'New',
            `admin_notes` TEXT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($query);
        @$this->db->query("ALTER TABLE `enquiries` MODIFY `email` VARCHAR(255) NULL;");

        // Check if status & admin_notes columns exist for backward compatibility
        $cols = array(
            'status' => "VARCHAR(50) DEFAULT 'New'",
            'admin_notes' => "TEXT NULL"
        );
        foreach ($cols as $col_name => $col_def) {
            $check = $this->db->query("SHOW COLUMNS FROM `enquiries` LIKE '{$col_name}'");
            if ($check && $check->num_rows() == 0) {
                @$this->db->query("ALTER TABLE `enquiries` ADD COLUMN `{$col_name}` {$col_def}");
            }
        }
    }

    public function get_all_enquiries($status = null, $limit = null) {
        if ($status && $status !== 'All') {
            $this->db->where('status', $status);
        }
        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            $this->db->limit($limit);
        }
        $query = $this->db->get('enquiries');
        return $query ? $query->result_array() : array();
    }

    public function get_enquiry_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('enquiries');
        return ($query && $query->num_rows() > 0) ? $query->row_array() : null;
    }

    public function add_enquiry($data) {
        return $this->db->insert('enquiries', $data);
    }

    public function update_status($id, $status, $admin_notes = null) {
        $data = array('status' => $status);
        if ($admin_notes !== null) {
            $data['admin_notes'] = $admin_notes;
        }
        $this->db->where('id', $id);
        return $this->db->update('enquiries', $data);
    }

    public function delete_enquiry($id) {
        $this->db->where('id', $id);
        return $this->db->delete('enquiries');
    }

    public function get_stats() {
        $stats = array(
            'total'   => 0,
            'new'     => 0,
            'read'    => 0,
            'replied' => 0
        );

        $q_total = $this->db->get('enquiries');
        if ($q_total) {
            $stats['total'] = $q_total->num_rows();
        }

        $q_new = $this->db->where('status', 'New')->get('enquiries');
        if ($q_new) {
            $stats['new'] = $q_new->num_rows();
        }

        $q_read = $this->db->where('status', 'Read')->get('enquiries');
        if ($q_read) {
            $stats['read'] = $q_read->num_rows();
        }

        $q_replied = $this->db->where('status', 'Replied')->get('enquiries');
        if ($q_replied) {
            $stats['replied'] = $q_replied->num_rows();
        }

        return $stats;
    }
}
