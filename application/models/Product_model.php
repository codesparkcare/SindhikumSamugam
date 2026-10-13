<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->create_table_if_not_exists();
    }

    private function create_table_if_not_exists()
    {
        $query = "CREATE TABLE IF NOT EXISTS `products` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `seller_name` VARCHAR(150) NOT NULL,
            `seller_email` VARCHAR(150) NULL,
            `seller_phone` VARCHAR(50) NOT NULL,
            `seller_city` VARCHAR(100) NULL,
            `title` VARCHAR(255) NOT NULL,
            `category` VARCHAR(100) NOT NULL DEFAULT 'Books & Study Materials',
            `condition_type` VARCHAR(50) DEFAULT 'Good',
            `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
            `original_price` DECIMAL(10,2) NULL,
            `is_free` TINYINT(1) DEFAULT 0,
            `description` TEXT NOT NULL,
            `image` VARCHAR(255) NULL,
            `duration_hours` INT DEFAULT 72,
            `status` ENUM('pending', 'approved', 'rejected', 'expired') DEFAULT 'pending',
            `rejection_reason` TEXT NULL,
            `approved_at` DATETIME NULL,
            `expires_at` DATETIME NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        
        $this->db->query($query);

        $app_table_query = "CREATE TABLE IF NOT EXISTS `product_applications` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `product_id` INT NOT NULL,
            `product_title` VARCHAR(255) NOT NULL,
            `applicant_name` VARCHAR(150) NOT NULL,
            `applicant_phone` VARCHAR(50) NOT NULL,
            `applicant_email` VARCHAR(150) NULL,
            `institution` VARCHAR(255) NULL,
            `course_year` VARCHAR(100) NULL,
            `address` TEXT NULL,
            `reason` TEXT NULL,
            `status` VARCHAR(50) DEFAULT 'Pending',
            `admin_notes` TEXT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($app_table_query);

        // Ensure admin_notes column exists if table was previously created without it
        if ($this->db->table_exists('product_applications') && !$this->db->field_exists('admin_notes', 'product_applications')) {
            $this->db->query("ALTER TABLE `product_applications` ADD COLUMN `admin_notes` TEXT NULL AFTER `status`");
        }

        // Seed initial sample products if table is empty
        $count = $this->db->count_all_results('products');
        if ($count == 0) {
            $this->seed_sample_products();
        }
    }

    public function insert_application($data)
    {
        return $this->db->insert('product_applications', $data);
    }

    private function seed_sample_products()
    {
        $now = time();
        $samples = array(
            array(
                'seller_name' => 'Karthik Subramanian',
                'seller_email' => 'karthik.sub@gmail.com',
                'seller_phone' => '+91 98412 34567',
                'seller_city' => 'Tirunelveli',
                'title' => 'HP 15s Intel Core i5 Laptop (16GB RAM / 512GB SSD)',
                'category' => 'Laptops & Gadgets',
                'condition_type' => 'Like New',
                'price' => 24500.00,
                'original_price' => 52000.00,
                'is_free' => 0,
                'description' => 'Gently used for engineering coursework. Battery health 92%. Comes with original charger, laptop bag, and wireless mouse.',
                'image' => 'sample_laptop.jpg',
                'duration_hours' => 48,
                'status' => 'approved',
                'approved_at' => date('Y-m-d H:i:s', $now - 3600 * 6),
                'expires_at' => date('Y-m-d H:i:s', $now + 3600 * 42), // 42 hrs remaining
                'created_at' => date('Y-m-d H:i:s', $now - 3600 * 8)
            ),
            array(
                'seller_name' => 'Ananya R.',
                'seller_email' => 'ananya.mbbs@gmail.com',
                'seller_phone' => '+91 97890 12345',
                'seller_city' => 'Madurai',
                'title' => 'Complete Medical Entrance (NEET UG) Books Set (Vol 1-4)',
                'category' => 'Books & Study Materials',
                'condition_type' => 'Good',
                'price' => 1200.00,
                'original_price' => 4500.00,
                'is_free' => 0,
                'description' => 'Comprehensive Physics, Chemistry & Biology modules with handwritten formula sheets and solved question papers from past 10 years.',
                'image' => 'sample_books.jpg',
                'duration_hours' => 72,
                'status' => 'approved',
                'approved_at' => date('Y-m-d H:i:s', $now - 3600 * 12),
                'expires_at' => date('Y-m-d H:i:s', $now + 3600 * 60), // 60 hrs remaining
                'created_at' => date('Y-m-d H:i:s', $now - 3600 * 14)
            ),
            array(
                'seller_name' => 'Dr. Meenakshi S.',
                'seller_email' => 'meenakshi.s@gmail.com',
                'seller_phone' => '+91 94433 87654',
                'seller_city' => 'Chennai',
                'title' => 'Scientific Drafter & Engineering Drawing Tool Kit',
                'category' => 'Stationery & Engineering Tools',
                'condition_type' => 'Good',
                'price' => 0.00,
                'original_price' => 1800.00,
                'is_free' => 1,
                'description' => 'Donating for free to any 1st year Mechanical or Civil engineering student who needs it. Mini drafter, compass set, sheet holder included.',
                'image' => 'sample_drafter.jpg',
                'duration_hours' => 24,
                'status' => 'approved',
                'approved_at' => date('Y-m-d H:i:s', $now - 3600 * 4),
                'expires_at' => date('Y-m-d H:i:s', $now + 3600 * 20), // 20 hrs remaining
                'created_at' => date('Y-m-d H:i:s', $now - 3600 * 5)
            )
        );

        $this->db->insert_batch('products', $samples);
    }

    public function mark_expired_products()
    {
        $now = date('Y-m-d H:i:s');
        $this->db->where('status', 'approved');
        $this->db->where('expires_at <=', $now);
        $this->db->update('products', array('status' => 'expired'));
    }

    public function get_active_products($category = null, $search = null)
    {
        $this->mark_expired_products();

        $now = date('Y-m-d H:i:s');
        $this->db->where('status', 'approved');
        $this->db->where('expires_at >', $now);

        if (!empty($category) && $category !== 'All') {
            $this->db->where('category', $category);
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('title', $search);
            $this->db->or_like('description', $search);
            $this->db->or_like('seller_city', $search);
            $this->db->group_end();
        }

        $this->db->order_by('expires_at', 'ASC');
        return $this->db->get('products')->result_array();
    }

    public function get_product_by_id($id)
    {
        return $this->db->get_where('products', array('id' => $id))->row_array();
    }

    public function insert_product($data)
    {
        return $this->db->insert('products', $data);
    }

    public function get_stats()
    {
        $this->mark_expired_products();
        $now = date('Y-m-d H:i:s');
        $total_active = $this->db->where('status', 'approved')->where('expires_at >', $now)->count_all_results('products');
        $total_pending = $this->db->where('status', 'pending')->count_all_results('products');
        $total_expired = $this->db->where('status', 'expired')->count_all_results('products');
        $total_rejected = $this->db->where('status', 'rejected')->count_all_results('products');
        $total_all = $this->db->count_all_results('products');

        return array(
            'active' => $total_active,
            'pending' => $total_pending,
            'expired' => $total_expired,
            'rejected' => $total_rejected,
            'total' => $total_all
        );
    }

    public function get_admin_products($status = null, $date_from = null, $date_to = null, $search = null)
    {
        $this->mark_expired_products();

        if (!empty($status) && strtolower($status) !== 'all') {
            $this->db->where('status', strtolower($status));
        }

        if (!empty($date_from)) {
            $this->db->where('DATE(created_at) >=', $date_from);
        }

        if (!empty($date_to)) {
            $this->db->where('DATE(created_at) <=', $date_to);
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('title', $search);
            $this->db->or_like('seller_name', $search);
            $this->db->or_like('seller_phone', $search);
            $this->db->or_like('seller_city', $search);
            $this->db->or_like('category', $search);
            $this->db->group_end();
        }

        $this->db->order_by('id', 'DESC');
        return $this->db->get('products')->result_array();
    }

    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id)
    {
        // Delete image file if exists
        $product = $this->get_product_by_id($id);
        if ($product && !empty($product['image'])) {
            $file_path = './uploads/products/' . $product['image'];
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
        }

        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function approve_product($id, $duration_hours = null)
    {
        $product = $this->get_product_by_id($id);
        if (!$product) return false;

        $hours = $duration_hours ? intval($duration_hours) : intval($product['duration_hours']);
        if ($hours <= 0) $hours = 72;

        $approved_at = date('Y-m-d H:i:s');
        $expires_at = date('Y-m-d H:i:s', strtotime("+{$hours} hours"));

        $update = array(
            'status' => 'approved',
            'duration_hours' => $hours,
            'approved_at' => $approved_at,
            'expires_at' => $expires_at,
            'rejection_reason' => null
        );

        $this->db->where('id', $id);
        return $this->db->update('products', $update);
    }

    public function reject_product($id, $reason = '')
    {
        $this->db->where('id', $id);
        return $this->db->update('products', array(
            'status' => 'rejected',
            'rejection_reason' => $reason
        ));
    }

    // ==========================================
    // Product Applications Management Methods
    // ==========================================

    public function get_application_stats()
    {
        $total_all = $this->db->count_all_results('product_applications');
        $total_pending = $this->db->where('status', 'Pending')->count_all_results('product_applications');
        $total_approved = $this->db->where('status', 'Approved')->count_all_results('product_applications');
        $total_delivered = $this->db->group_start()->where('status', 'Delivered')->or_where('status', 'Completed')->group_end()->count_all_results('product_applications');
        $total_rejected = $this->db->where('status', 'Rejected')->count_all_results('product_applications');

        return array(
            'total' => $total_all,
            'pending' => $total_pending,
            'approved' => $total_approved,
            'delivered' => $total_delivered,
            'rejected' => $total_rejected
        );
    }

    public function get_admin_applications($status = null, $date_from = null, $date_to = null, $search = null)
    {
        if (!empty($status) && strtolower($status) !== 'all') {
            if (strtolower($status) === 'delivered' || strtolower($status) === 'completed') {
                $this->db->group_start()->where('status', 'Delivered')->or_where('status', 'Completed')->group_end();
            } else {
                $this->db->where('status', $status);
            }
        }

        if (!empty($date_from)) {
            $this->db->where('DATE(created_at) >=', $date_from);
        }

        if (!empty($date_to)) {
            $this->db->where('DATE(created_at) <=', $date_to);
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('applicant_name', $search);
            $this->db->or_like('applicant_phone', $search);
            $this->db->or_like('applicant_email', $search);
            $this->db->or_like('institution', $search);
            $this->db->or_like('product_title', $search);
            $this->db->or_like('address', $search);
            $this->db->group_end();
        }

        $this->db->order_by('id', 'DESC');
        return $this->db->get('product_applications')->result_array();
    }

    public function get_application_by_id($id)
    {
        return $this->db->get_where('product_applications', array('id' => $id))->row_array();
    }

    public function update_application_status($id, $status, $admin_notes = null)
    {
        $data = array('status' => $status);
        if ($admin_notes !== null) {
            $data['admin_notes'] = $admin_notes;
        }
        $this->db->where('id', $id);
        return $this->db->update('product_applications', $data);
    }

    public function delete_application($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('product_applications');
    }
}
