<?php
if (!function_exists('format_mr')) {
    function format_mr($temp_mr) {
        if (strlen($temp_mr) > 8) {
            $temp_mr = substr($temp_mr, -8);
        }
        $set_mr = str_pad($temp_mr, 8, '0', STR_PAD_LEFT);
        return implode('.', str_split($set_mr, 2));
    }
}
?>