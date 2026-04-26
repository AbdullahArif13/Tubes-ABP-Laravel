<?php

if (!function_exists('formatRupiah')) {
    /**
     * Memformat angka menjadi Rupiah (IDR)
     */
    function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}