<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('getWaktuJakarta')) {
    function getWaktuJakarta() {
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Mengembalikan waktu sekarang dalam format 'Y-m-d H:i:s'
        return date('Y-m-d H:i:s');
    }
}
