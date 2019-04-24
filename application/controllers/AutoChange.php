<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AutoChange extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_autoChange', 'auto');
        $this->auto->prosesData();

        $this->load->view('auto/change');
    }
}

/* End of file AutoChange.php */
