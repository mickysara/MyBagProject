<input class="timepicker text-center" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown">

<?php 

$this->db->where('ID_Activities', '105');
$query = $this->db->get('Activities');
$data = $query->row_array();
$DateStart = $data['DateStart'];
$DateEnd = $data['DateEnd'];


$Dateshow = strtotime($DateStart);
$Dateshowshow = date("Y-m-d", strtotime("+2 Day",$Dateshow));

$numdate = round(abs(strtotime($DateStart) - strtotime($DateEnd))/60/60/24);
$plusdate = "+".$numdate." "."Day";

for ($x = 0; $x <= $numdate; $x++) {
    $plusdate = "+".$x." "."Day";

    $d=strtotime($plusdate);
    echo date("Y-m-d", strtotime($plusdate,$Dateshow));

    // echo "The number is: $x <br>";
}

								      ?>
                                      