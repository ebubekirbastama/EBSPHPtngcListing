<!DOCTYPE html>
<html>
    <head>
    <title> EBS Sorgu</title>
</head>
<body>
   
    <?php
    for ($i = 1; $i <= 81; $i++) {


        $url = "https://www.tongucakademi.com/ilcelerigetir";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "authority: www.tongucakademi.com",
            "pragma: no-cache",
            "cache-control: no-cache",
            "sec-ch-ua: Chromium;v=94,Google Chrome;v=94,;Not A Brand;v=99",
            "accept: application/json, text/javascript, */*; q=0.01",
            "content-type: application/json; charset=UTF-8",
            "x-requested-with: XMLHttpRequest",
            "sec-ch-ua-mobile: ?0",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36",
            "sec-ch-ua-platform: Windows",
            "origin: https://www.tongucakademi.com",
            "sec-fetch-site: same-origin",
            "sec-fetch-mode: cors",
            "sec-fetch-dest: empty",
            "referer: https://www.tongucakademi.com/satisnoktalarimiz",
            "accept-language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = '{"Plaka":' . $i . '}';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $jsondeger = json_decode($resp);

        foreach ($jsondeger->Data->Musteri as $value) {

            echo str_replace($value->adresAdi, "Teslimat Adresi", "");
            echo $value->ad . " : ";
            echo $value->email . " : ";
            echo $value->cep . " : ";
            echo $value->plaka . " : ";
            echo $value->il . " : ";
            echo $value->ilce . " : ";
            echo $value->adres . " : ";
            echo $value->id . "<br>";
        }
    }
    ?>


</body>
</html>
