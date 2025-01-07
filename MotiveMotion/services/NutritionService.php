<?php

class NutritionService {
    public static function getProteinIntakeEggs() {
        $apiKey = '396af3822e2ef1e37ea78644edbbea12';
        $appId = '519f4f2b';
        $url = "https://api.edamam.com/api/nutrition-data";


        // Construim cererea către API-ul Edamam
        $data = [
            'app_id' => $appId,
            'app_key' => $apiKey,
            'ingr' => "1 large egg"
        ];

        $query = http_build_query($data);
        $fullUrl = $url . '?' . $query;


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        curl_close($ch);


        $result = json_decode($response, true);


        if (isset($result['totalNutrients']['PROCNT']['quantity'])) {
            return $result['totalNutrients']['PROCNT']['quantity'];
        } else {
            return null;
        }
    }
}
?>