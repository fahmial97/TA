<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoChange extends CI_Controller {

    public function index()
    {
        $this->load->model('M_autoChange','auto');

        $data = $this->auto->prosesData();

        echo $data;
        
        $this->load->view('auto/change');
    }

}

/* End of file AutoChange.php */
