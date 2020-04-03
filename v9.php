<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo "\n";
					  echo "\e[91m              Time:".date('[d-m-Y] [H:i:s]')."\n";
					  echo "\e[92m          ╔══════════════════════════════════╗\n";
					  echo "\e[92m          ║  SELAMAT DATANG DI TERMUX GOJEK  ║\n";
					  echo "\e[92m          ║ AUTO REGISTRASI & REDEEM VOUCHER ║\n";
					  echo "\e[92m          ║   UNTUK REGISTRASI CALL ADMIN    ║\n";
					  echo "\e[92m          ║      TERMUX SCRIP VERSI 10       ║\n";
					  echo "\e[92m          ╚══════════════════════════════════╝\n";
					  echo "\e[93m          ╔══════════════════════════════════╗\n";
					  echo "\e[93m          ║  \e[91mVOUCHER YANG TERSEDIA DI TERMUX \e[93m║\n";
					  echo "\e[93m          ║▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GOFOOD 15K MINBEL 30K  ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GOFOOD 10K MINBEL 30K  ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GOFOOD  5K MINBEL 30K  ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GORIDE  3K TUNAI       ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GOCAR   5K CASHBACK    ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GORIDE 99% CASHBACK    ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER GOCAR  99% CASHBACK    ║\n";
					  echo "\e[93m          ║ ✓ VOUCHER Cashback 10K EATLAH    ║\n";
					  echo "\e[93m          ║                                  ║\n";
					  echo "\e[93m          ║▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬║\n";
					  echo "\e[93m          ║          \e[94mZY TERMUX MEDAN         \e[93m║\n";
					  echo "\e[93m          ╚══════════════════════════════════╝\n";
		echo "\n";
		echo "\n";
		echo "\n";
		echo "\n";
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
	login:
	echo "\e[93m╔══════════════════════════════════╗\n";
	echo "\e[93m║ User Login : ";
	echo "\033[30;40m";
	$user = trim(fgets(STDIN));
	echo "\033[0m";
	if($user == "indonesia" || $user == "april")
	{
		echo "\e[93m╚══════════════════════════════════╝\n";
		echo "\e[93m╔══════════════════════════════════╗\n";
		echo "\e[93m║ \e[91m[?] Ketik Nama Anda ?: ";	
		$input = trim(fgets(STDIN));
		echo "\e[93m╚══════════════════════════════════╝\n";
			goto ulang;
	}
	else
	{
			echo "\e[93m╚══════════════════════════════════╝\n";	
			echo "\e[93m╔══════════════════════════════════╗\n";
			echo "\e[91m║   USER SALAH MASUKAN YG BENAR    ║\n";
			echo "\e[91m║  REQUEST USER CALL ADMIN TERMUX  ║\n";
			echo "\e[91m║    WHATSAPP : 0821-6555-0209     ║\n";
			echo "\e[93m╚══════════════════════════════════╝\n";
	goto login;
	}
		return rtrim( $input, "\n" );
	ulang:
	echo "\n";
	echo "\n";
	echo "\e[92m        Selamat Datang $input         \n";
	echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
	nomer:
        echo "\e[92m[✓] Masukkan Nomor HP Anda (62/1) : ";
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", "", $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","[✓] Kode verifikasi sudah di kirim")."\n";
		echo "\n";
		echo "\n";
		sleep(3);
        otp:
		echo "\e[93m╔══════════════════════════════════╗\n";
		echo "\e[93m║ [✓] Masukan Kode OTP: ";
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo "\e[93m║ \e[92m[✓] Berhasil mendaftar\n";
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\e[93m║ [✓] Your access token : ".$token."\n";
        save("token.txt",$token);
		echo "\e[93m╚══════════════════════════════════╝\n";
		echo "\e[93m╔══════════════════════════════════╗\n";
        echo "\e[93m║ \e[92mRedeem Voucher [Y/N]? : ";
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
		echo "\e[93m╚══════════════════════════════════╝\n";
        echo "\n".color("yellow","[1] Mencoba Redeem Voucher Gopay");
        echo "\n".color("yellow","[✓] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"EATLAH"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","[✓] Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red","[X] Message: ".$message);
        gocar:
        echo "\n".color("yellow","[2] Mencoba Redeem Voucher Gofood");
        echo "\n".color("yellow","[✓] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420A"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","[✓] Message: ".$message);
        goto thanks;
        }else{
        echo "\n".color("red","[X] Message: ".$message);
		goto thanks;
        reff:
        $data = '{"referral_code":"G-75SR565"}';    
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        }
        gofood:
        echo "\n".color("yellow","!] Claim voc GOCAR pot 14K");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOCAR14"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        sleep(1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        echo "\n".color("yellow","!] Total voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
        echo "\n".color("green","                     5. ".$voucher5);
        echo "\n".color("green","                     6. ".$voucher6);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
         setpin:
         echo "\n".color("nevy","?] Mau set pin?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","========( PIN ANDA = 225588 )========")."\n";
         $data2 = '{"pin":"225588"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp set pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo "\e[91m║ [X] Otp yang anda input salah    ║\n";
         echo "\e[91m║▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬║\n";
		 echo "\e[91m║      Silahkan input kembali      ║\n";
		 echo "\e[91m╚══════════════════════════════════╝\n";
         goto otp;
         }
         }else{
         echo "\e[91m[X] Nomer Sudah Terdaftar\n";
         echo "\e[91m[?] Mau ulang [Y/N] ?: ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
         goto ulang;
         }else{
         echo "\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
		 goto thanks;
		 
		 thanks:
		 echo "\n";
	echo "\n";
	echo "\e[93m╔══════════════════════════════════╗\n";
	echo "\e[93m║            Terimakasih           ║\n";
	echo "\e[93m║  THANKS TO SUPPORT GOJEK MEDAN   ║\n";
	echo "\e[93m║UNTUK REGISTRASI CALL ADMIN TERMUX║\n";
	echo "\e[93m║ Call Center : 0821 - 6555 - 0209 ║\n";
	echo "\e[93m║▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬║\n";
	echo "\e[93m║   KETIK PHP 10.PHP LALU ENTER    ║\n";
	echo "\e[93m║  Jika GOFOOD MERAH MASUKAN KODE  ║\n";
	echo "\e[93m║       \e[91mCOBAGOFOOD010420A          \e[93m║\n";
	echo "\e[93m╚══════════════════════════════════╝\n";
	echo "\n";
	echo "\n";
  }
 }
}
echo change()."\n"; ?>
