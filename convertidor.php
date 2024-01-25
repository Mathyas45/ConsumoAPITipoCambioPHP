<?php
if (isset($_POST['valor'])) {
    $valor = floatval($_POST['valor']);

    $apiUrl = "https://v6.exchangerate-api.com/v6/528e55c7a64d5caa1f352ab2/pair/USD/PEN/{$valor}";

    $iniciarCURL = curl_init($apiUrl);

    curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($iniciarCURL);

    // print_r($respuesta);

    if (curl_errno($iniciarCURL) || curl_getinfo($iniciarCURL, CURLINFO_HTTP_CODE) != 200) {
        echo "Error: " . curl_error($iniciarCURL);
        exit();
    }
    curl_close($iniciarCURL);


    $datosJson = json_decode($respuesta, true);
    // print_r($datosJson['conversion_rate']);

    $costo_dolar =$datosJson['conversion_rate'];
    $conversion=$datosJson['conversion_result'];
    
    echo"<br>{$valor} USD equivale a {$conversion} Soles. El dolar está {$costo_dolar}. hoy";
    
}
