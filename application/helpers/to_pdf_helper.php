<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function pdf_create($html, $orientation, $filename, $stream = TRUE, $paper_size = NULL) {
    $base = '';
    require_once("dompdf/dompdf_config.inc.php");
    spl_autoload_register('DOMPDF_autoload');

    $dompdf = new DOMPDF();
    if (!empty($paper_size)) {
        $dompdf->set_paper($paper_size, $orientation);
    } else {
        $dompdf->set_paper("a4", $orientation);
    }
    $dompdf->load_html($html);
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        $ci = & get_instance();
        $ci->load->helper('file');
        if (!is_dir("file")):
            $cd = mkdir("file", 0777, TRUE);

        endif;

        write_file('file/' . $filename . '.pdf', $dompdf->output());
    }
}
