<input class="timepicker text-center" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown">

$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|png|pdf';
$config['max_size'] = '1000000000';
$config['max_width'] = '1000000000';
$config['max_height'] = '1000000000';

$this->load->library('upload', $config);

$cust_id = $this->session->userdata('user_id');


if (! $this->upload->do_upload('file')) {
echo $this->upload->display_errors();
} else {
$data = $this->upload->data();

$filename = $data['file_name'];
//$imgtype_name = $data['imgtype_name'];
$arr=array( 'reservationsstart' => $this->input->post('reservationsstart'),
'slip_date' => date('Y-m-d'),
'slip_file'=>$filename,
'id_users' => $cust_id,
'deposit' => $this->input->post('deposit'),

);
$this->ReservationsModel->insert_order($arr);