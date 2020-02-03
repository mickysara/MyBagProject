<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertUsers extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('InsertUsers');
        $this->load->view('Footer');
    }

    public function ShowMajor($id)
    {
        $this->db->where('ID_Campus', $id);
        $query = $this->db->get('Major');

          foreach($query->result_array() as $data)
          { ?>
                <option value="<?php echo $data['ID_Major'] ?>">
					<?php echo $data['Name_Major'] ?> </option>
    <?php }
    }

    public function ShowBranch($id)
    {
        $this->db->where('ID_Major', $id);
        $query = $this->db->get('Branch');

          foreach($query->result_array() as $data)
          { ?>
                <option value="<?php echo $data['ID_Branch'] ?>">
					<?php echo $data['Name_Branch'] ?> </option>
    <?php }
    }

}

/* End of file InsertUsers.php */
