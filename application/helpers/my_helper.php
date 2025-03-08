<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_wali_kelas')) {
    function is_wali_kelas($user_id)
    {
        $CI = &get_instance();
        $CI->load->database();

        $query = $CI->db->query("SELECT COUNT(*) as count FROM kelas WHERE wali_kelas = ?", array($user_id));
        $result = $query->row();

        return ($result->count > 0);
    }
}
