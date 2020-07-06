<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Testcurl extends CI_Controller {

    public function index()
    {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://cms.th.kerryexpress.com/easyship-api/api/Member/v2.5/GetCaptcha",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Content-Length: 0",
            "Cookie: BIGipServerpool_cms.th_cus=386625546.20480.0000; BIGipServerpool_cms.th=470511626.20480.0000; TS0197e574=0166bb864dba7675ce142bc1c14c015cb45dce36b1676875c930dd43dfd10dab999c8147de9999728223b725cc05a409d9f66a89711c76099f749b1ebda37edb18f0645dc776b51055d547bdb99d4f54a30c2cb771"
          ),
        ));
        
        $response = curl_exec($curl);
        $otp = null;
        $data = json_decode($response);
        // echo $data->Token;   
        //  print_r($data);
        // echo $data->Hint->Th;
        
        foreach($data->OtpItem as $mydata)
        {
             if($data->Hint->Th == "หัวใจ" && $mydata->Emoji == "🧡")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ลูกบาส" && $mydata->Emoji == "🏀")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "นาฬิกา" && $mydata->Emoji == "⌚️")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ลิง" && $mydata->Emoji == "🐵")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "รถยนต์" && $mydata->Emoji == "🚗")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ช้าง" && $mydata->Emoji == "🐘")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ปาก" && $mydata->Emoji == "💋")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "องุ่น" && $mydata->Emoji == "🍇")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ต้นไม้" && $mydata->Emoji == "🌳")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "พระอาทิตย์" && $mydata->Emoji == "☀️")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
             if($data->Hint->Th == "ปลาโลมา" && $mydata->Emoji == "🐬")
             {
                $otp = $mydata->Otp;
                echo $mydata->Emoji;
             }
        }      

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://cms.th.kerryexpress.com/easyship-api/api/Member/v2.5/Login/MobileNo",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\"mobileNo\":\"0873428415\",\"password\":\"871611\",\"captchaToken\":\"$data->Token\",\"captchaReference\":\"$data->Reference\",\"captchaOtp\":\"$otp\"}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Cookie: BIGipServerpool_cms.th_cus=386625546.20480.0000; BIGipServerpool_cms.th=470511626.20480.0000; TS0197e574=0166bb864ddb1caa2ee309b825b5438fa33c4c55fd0eeb524dea9d11b5cc64818a60eb2aea5540de416f673bc9c38754358c095f3e218c484a1d9217a5efcc48a4aa019b621f3610cd010d71af023096f329418f3f"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://cms.th.kerryexpress.com/easyship-api/api/Booking/v2.5/MDE/Recipient/Save",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\"batchNo\": \"1700086043M20206005\",\r\n\"codAmount\": 0,\r\n\"isSCL\": false,\r\n\"memberID\": \"1700086043\",\r\n\"recipientAddress\": \"99/533 ซ.4/3 หมู่บ้านชลลดาวงแหวนรัตนาธิเบศร์ ต.บางรักพัฒนา\",\r\n\"recipientAddress2\": \"พระบรมมหาราชวัง,↵            เขตพระนคร,↵            กรุงเทพมหานคร,↵            10200\",\r\n\"recipientDistrict\": \"เขตพระนคร\",\r\n\"recipientEmail\": null,\r\n\"recipientMobile\": \"0917453912\",\r\n\"recipientName\": \"วรพงษ์ สารศรี\",\r\n\"recipientPostalCode\": \"10200\",\r\n\"recipientProvince\": \"กรุงเทพมหานคร\",\r\n\"recipientSubDistrict\": \"พระบรมมหาราชวัง\",\r\n\"ref1\": null,\r\n\"ref2\": null,\r\n\"remark\": \"\",\r\n\"sclLocation\": \"\"\r\n}",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIwNzZhZmY2OC1mODZlLTQ0N2QtYTFmMC03OGNiMGMxYzhjMDgiLCJleHAiOjE1OTIzNDA0NjIsImlzcyI6Imh0dHBzOi8vcnRzcC50aC5rZXJyeWV4cHJlc3MuY29tIiwiYXVkIjoiaHR0cHM6Ly9ydHNwLnRoLmtlcnJ5ZXhwcmVzcy5jb20iLCJ0a24iOiJhYjljMTk5MjM2ZDA0NWI3OTlhMGE2MzExMDk4YzlmNSJ9.HOa0q2WaJOdjUKskoE6tehgLajisBYCzGY9nrj89Efw",
            "Content-Type: application/json",
            "Cookie: BIGipServerpool_cms.th_cus=386625546.20480.0000; BIGipServerpool_cms.th=470511626.20480.0000; TS0197e574=0166bb864dff59cb53bfe322d4fc3762639c7d46c20c07ec670109a10390b0ca3e0cbe22f992c908f2ea5154957a7535a6189f206385ae120c19614fdfcaed9f4f2a16a89ac8a19268e44d0435234a4a5e8f657024"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }
                

}

/* End of file Testcurl.php */
