
<? php

kelas tri {
  
   ikal fungsi ( $ host , $ header , $ body , $ method )
  	{
  		$ ch = curl_init ();
  		curl_setopt ( $ ch , CURLOPT_URL , $ host );
  		curl_setopt ( $ ch , CURLOPT_HTTPHEADER , $ header );	
  		curl_setopt ( $ ch , CURLOPT_HEADER , true );
  		curl_setopt ( $ ch , CURLOPT_CUSTOMREQUEST , $ method );
  		curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , true );
  		curl_setopt ( $ ch , CURLOPT_ENCODING , 'gzip' );
  		curl_setopt ( $ ch , CURLOPT_POSTFIELDS , $ body );
  		curl_setopt ( $ ch , CURLOPT_COOKIEJAR , 'cookie.txt' );
  		curl_setopt ( $ ch , CURLOPT_COOKIEFILE , 'cookie.txt' );
  		curl_setopt ( $ ch , CURLOPT_SSL_VERIFYHOST , false );
curl_setopt ( $ ch , CURLOPT_SSL_VERIFYPEER , true );
  		$ req = curl_exec ( $ ch );
  		$ req = meledak ( "\ r \ n \ r \ n" , $ req );
  		mengembalikan   $ req ;
  	}



  function   request_otp ( $ msisdn , $ imei )
  {
    $ body = array ( "msisdn" => $ msisdn );
    $ body = json_encode ( $ body );
    $ ctl = strlen ( $ body );
    $ header = array ( "Host: bonstri.tri.co.id" ,
 "Koneksi: tetap hidup" ,
 "Panjang Konten:" . $ ctl ,
 "Terima: aplikasi / json, teks / polos, * / *" ,
 "Asal: http: //bonstri.tri.co.id" ,
 "User-Agent: Mozilla / 5.0 (Linux; Android 9; Redmi Note 5) AppleWebKit / 537.36 (KHTML, seperti Gecko) Chrome / 71.0.3578.99 Mobile Safari / 537.36" ,
 "Tipe-Konten: aplikasi / json" ,
 "Referer: http: //bonstri.tri.co.id/login? ReturnUrl =% 2Rumah" ,
 "Terima-Pengkodean: gzip, deflate" ,
 "Bahasa Terima: id-ID, id; q = 0.9, en-US; q = 0.8, en; q = 0.7" );
    $ response = $  this -> curls ( 'http://bonstri.tri.co.id/api/v1/login/request-otp' , $ header , $ body , 'POST' );
    mengembalikan   $ respons ;
  }
  
  fungsi   masuk ( $ msisdn , $ otp )
  {
    $ body = "grant_type" . '=' . "kata sandi" . '&' . "nama pengguna" . '=' . $ msisdn . '&' . "kata sandi" . '=' . $ otp ;
    $ ctl = strlen ( $ body );
    $ header = array ( "Host: bonstri.tri.co.id" ,
 "Koneksi: tetap hidup" ,
 "Panjang Konten:" . $ ctl ,
 "Terima: aplikasi / json, teks / polos, * / *" ,
 "Asal: http: //bonstri.tri.co.id" ,
 "Otorisasi: Basic Ym9uc3RyaTpib25zdHJpc2VjcmV0" ,
 "User-Agent: Mozilla / 5.0 (Linux; Android 9; Redmi Note 5) AppleWebKit / 537.36 (KHTML, seperti Gecko) Chrome / 71.0.3578.99 Mobile Safari / 537.36" ,
 "Tipe-Konten: application / x-www-form-urlencoded" ,
 "Referer: http: //bonstri.tri.co.id/login? ReturnUrl =% 2Rumah" ,
 "Terima-Pengkodean: gzip, deflate" ,
 "Bahasa Terima: id-ID, id; q = 0.9, en-US; q = 0.8, en; q = 0.7" );
    $ response = $  this -> curls ( 'http://bonstri.tri.co.id/api/v1/login/validate-otp' , $ header , $ body , 'POST' );
    return   $ response [ 1 ];
  }
  
  function   trans ( $ bearer )
  {
    $ body = '{}' ;
    $ header = array ( "Host: bonstri.tri.co.id" ,
 "Koneksi: tetap hidup" ,
 "Panjang Konten: 2" ,
 "Terima: aplikasi / json, teks / polos, * / *" ,
 "Asal: http: //bonstri.tri.co.id" ,
 "Otorisasi: Pembawa" . $ pembawa ,
 "User-Agent: Mozilla / 5.0 (Linux; Android 9; Redmi Note 5) AppleWebKit / 537.36 (KHTML, seperti Gecko) Chrome / 71.0.3578.99 Mobile Safari / 537.36" ,
 "Tipe-Konten: aplikasi / json" ,
 "Referer: http: //bonstri.tri.co.id/voucherku" ,
 "Terima-Pengkodean: gzip, deflate" ,
 "Bahasa Terima: id-ID, id; q = 0.9, en-US; q = 0.8, en; q = 0.7" );
   $ response = $  this -> curls ( "http://bonstri.tri.co.id/api/v1/voucherku/voucher-history" , $ header , $ body , "POST" );
   return   $ response [ 1 ];
   
  }
  
   klaim fungsi ( $ bearer , $ id , $ id1 )
  {
    $ body = array ( "rewardId" => $ id1 , "rewardTransactionId" => $ id );
    $ body = json_encode ( $ body );
    $ ctl = strlen ( $ body );
    $ header = array ( "Host: bonstri.tri.co.id" ,
 "Koneksi: tetap hidup" ,
 "Panjang Konten:" . $ ctl ,
 "Terima: aplikasi / json, teks / polos, * / *" ,
 "Asal: http: //bonstri.tri.co.id" ,
 "Otorisasi: Pembawa" . $ pembawa ,
 "User-Agent: Mozilla / 5.0 (Linux; Android 9; Redmi Note 5) AppleWebKit / 537.36 (KHTML, seperti Gecko) Chrome / 71.0.3578.99 Mobile Safari / 537.36" ,
 "Tipe-Konten: aplikasi / json" ,
 "Referer: http: //bonstri.tri.co.id/voucherku" ,
 "Terima-Pengkodean: gzip, deflate" ,
 "Bahasa Terima: id-ID, id; q = 0.9, en-US; q = 0.8, en; q = 0.7" );
     $ response = $  this -> curls ( "http://bonstri.tri.co.id/api/v1/voucherku/get-voucher-code" , $ header , $ body , "POST" );
     return   $ response [ 1 ];
  }
  
  
  
}
?>
