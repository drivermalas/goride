<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}
include ("goride.php");
echo "\n";
echo "\n";
echo "\e[93m╔══════════════════════════════════╗\n";
echo "\e[93m║            Termux MDN            ║\n";
echo "\e[93m║ UNTUK REGISTRASI BISA HUB ADMIN  ║\n";
echo "\e[93m║  LOGIN DENGAN AKUN MEMBER AKTIF  ║\n";
echo "\e[93m╚══════════════════════════════════╝\n";
echo "\e[93m╔══════════════════════════════════╗\n";
echo "\e[93m║      GANTI IP SAAT BUAT BARU     ║\n";
echo "\e[93m╚══════════════════════════════════╝\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\e[93m╔══════════════════════════════════╗\n";
echo "\e[93m║ \e[91m[?] Sudah Punya User Login ?: ";	
$pilihy = trim(fgets(STDIN));
if($pilihy == "y" || $pilihy == "sudah")
echo "\e[93m╚══════════════════════════════════╝\n";
	goto login;
login:
echo "\e[93m╔══════════════════════════════════╗\n";
$pass = ask_hidden( '║ User Login : ' );
echo "\033[30;40m";
$user = trim(fgets(STDIN));
echo "\033[0m";
if($user == "indonesia" || $user == "gojek")
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
		echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
		echo "\e[91m[X] Masukan User Registrasi [X]\n";
		echo "\e[91m[X]    Segera DONASI 30K    [X]\n";
		echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
goto login;
}
	return rtrim( $input, "\n" );
ulang:
echo "\n";
echo "\n";
echo "\e[92m        Selamat Datang $input         \n";
echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
echo "\e[92m[✓] Masukkan Nomor HP Anda (62/1) : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[X] Nomer Sudah Pernah Daftar\n";
echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
	sleep (2);
	goto ulang;
    }
  else
    {
    otp:
echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
    echo "\e[92m[✓] Masukan Kode OTP : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
	if ($verif == false)
        {
        echo "\e[91m[X] Kode OTP Salah\n";
echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
        goto ulang;
        }
	echo "\n";	
	echo "\e[92m[✓] Registrasi Berhasil\n";
	sleep(2);
	echo "\e[92m[✓] Silahkan Chek Banner Gofood\n";
	echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
	echo "\n";
	echo "\n";
	sleep(2);
	daftar:
	echo "\e[93m[✓] Chek Banner (y/n): ";	
$pilihy = trim(fgets(STDIN));
if($pilihy == "Y" || $pilihy == "y")
	goto redeem;
else
	{
		echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
        echo "\e[92m[✓] Silahkan Chek Promo Anda\n";
		echo "\e[92m[✓] Jangan Lupa Donasi Seikhlasnya\n";
		echo "\e[91m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
		goto login;
		sleep(2);
	}
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
		redeem:
        echo "\e[93m[✓] Cheking Voucher 1";
		echo "\e[93m.";
		sleep(1);
		echo "\e[93m.";
		sleep(1);
		echo "\e[93m.";
		sleep(1);
		echo "\e[93m.\n";
		sleep(2);
        $claim = gofood($verif);
        if ($claim == false)
            {
            echo "\e[91m[X] Coba Chek Banner Gofood\n";
            sleep(2);
			
            echo "\e[93m[✓] Cheking Goride 7K";
			echo "\e[93m.";
			sleep(1);
			echo "\e[93m.";
			sleep(1);
			echo "\e[93m.";
			sleep(1);
			echo "\e[93m.\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[92m[©] ".$claim."\n";
                sleep(3);
                echo "\e[93m[✓] Cheking Goride 7K\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = goride7k($verif);
            if ($claim == false) 
		{
                echo  "\e[91m[X] Langsung Chek Voucher & Banner\n";
                sleep(3);
				goto ulang;
                echo "\e[93m[✓] VOUCHER DOMINO'S\n";
                sleep(3);
                goto ulang;
  
         }
            else
			{
                echo "\e[92m[©] ".$claim."\n";
                sleep(3);
                echo "\e[93m[✓] COBAINGOJEK GORIDE\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = goride7k($verif);
            if ($claim == false) 
			{
                echo  "\e[91m[↓] Voucher Habis !!!\n";
                sleep(3);
                echo "\e[93m[✓] COBAINGOJEK GORIDE\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[92m[©] ".$claim . "\n";
            sleep(3);
            echo "\e[93m[✓] COBAINGOJEK GORIDE\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = goride7k($verif);
            if ($claim == false ) 
			{
                echo  "\e[91m[↓] GORIDE HABIS\n";
                sleep(3);
                echo "\e[93m[✓] AYOCOBAGOJEK\n";
                sleep(3);

            }
            else{
                echo "\e[92m[©] ".$claim."\n";
                sleep(3);
                echo "\e[93m[✓] AYOCOBAGOJEK\n";
                sleep(3);
                goto goride;
            }
            goride:
            $claim = cekvocer($verif);
		if ($claim == false ) 
			{
                echo "\e[91m[↓] GORIDE HABIS\n";
				echo "\e[93m[✓] VOUCHER GOFOOD 25K\n";
                sleep(3);
				goto free;
                

            }
            else{
                echo "\e[92m[©] ".$claim."\n";
                sleep(3);
                echo "\e[93m[✓] VOUCHER GOFOOD 25K\n";
                sleep(3);
                goto free;
            }
            free:
            $claim = hemat($verif);
        if ($claim == false ) {
                echo "\e[91m[↓] Anda Belum Beruntung !!\n";
				goto ulang;
            }
            else
			{
                echo "\e[92m[+] ".$claim."\n";
            sleep(3);
			goto ulang;
			}
			}
	}
	

?>