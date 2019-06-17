<?php

    $destination = $_POST["destination"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $yetiskin = $_POST["yetiskin"];
    $cocuk = $_POST["çocuk"];
    $cout = $_POST["cout"];
    $cin = $_POST["cin"];
    $promo = $_POST["promo"];
    $mail = $_POST["mail"];
    $toplamKisi = $yetiskin + $cocuk;
   
        function indUcretHesapla($yetiskin, $cocuk,$promo)
        {
            $yUcret = 149;
            $cUcret = 119;
            $discount = 49;
            return (($yetiskin * $yUcret) + ($cocuk * $cUcret)) - $discount;
        }
    
        function ucretHesapla($yetiskin, $cocuk)
        {
            $yUcret = 149;
            $cUcret = 119;
            return (($yetiskin * $yUcret) + ($cocuk * $cUcret));
        }

    
    $diff = abs(strtotime($cout) - strtotime($cin));
 
    $yil = floor($diff / (365*60*60*24));
    $ay = floor(($diff - $yil * 365*60*60*24) / (30*60*60*24));
    $gece = floor(($diff - $yil * 365*60*60*24 - $ay*30*60*60*24)/ (60*60*24));
    $gun = $gece + 1;
  
    if(!preg_match("/[-0-9a-zA-Z.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}/", $mail ))
    {
        print "Geçerli bir eposta giriniz...";
    }
    else
    {
        print ("<fieldset style = \" width:300px;\">");
        print ("<h3>Rezervasyon Bilgisi</h3>");
        print ("Destination : ".$destination." Hotel<br/>");
        print ("İsim : ".$name." <br/>");
        print ("Soyisim : ".$surname." <br/>");
        print ("Email : ".$mail." <br/>");
        print ("Yetişkin Sayısı : ".$yetiskin."<br/>");
        print ("Çocuk Sayısı : ".$cocuk."<br/>");
        print ("Giriş : ".$cin."<br/>");
        print ("Çıkış : " . $cout . "<br/>");
        print ("Tatil Süresi : " .$gece." Gece ".$gun. " Gün<br/>");

    if($toplamKisi >= 4 || $promo=="AILE49")
    {
        print ("Toplam Ücret : ".($gun * indUcretHesapla($yetiskin, $cocuk,$promo))." ₺<br/>");
        print ("Uygulanan İndirim 49 ₺");
    }
    else    
        print ("Toplam Ücret : ".($gun * UcretHesapla($yetiskin, $cocuk))." ₺");

       // $database = mysql_connect("localhost" , "root" , "12345");
        //mysql_select_db("shape" , $database);
        //$query = "UPDATE" , $gun . "SET" . $yetiskin . "=" + $cocuk + ";" ;
        //mysql.close($database);
    }
?>