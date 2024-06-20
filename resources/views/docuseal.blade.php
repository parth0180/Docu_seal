<?php

$api_key =env('DOCUSEAL_API_KEY');
$url = 'https://api.docuseal.co/submissions';

// Data to be sent in the POST request
$data = [
    "template_id" => 130504,
    "order" => "preserved",
    "submitters" => [
        [
            "email" => "kkodhvani@gmail.com",
            "fields" => [
                [
                    "name" => "Name", // Corrected 'name' key
                    "default_value" => "parth dsfmsnd 464664 54646 4646 ",
                    "readonly" => true
                ]
            ]
        ]
    ]
];

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "X-Auth-Token: $api_key",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($data),
]);

// Execute the request and capture the response
$response = curl_exec($curl);
$err = curl_error($curl);

// Close cURL
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response_data = json_decode($response, true);
    
    if (json_last_error() === JSON_ERROR_NONE) {
        // Debug output for the response
        echo "<pre>";
        print_r($response_data);
        echo "</pre>";

        // Check if the response has the expected structure
        if (isset($response_data['error'])) {
            echo "API Error: " . $response_data['error'];
        } elseif (isset($response_data[0]['slug'])) {
//            echo var_dump($response_data[0]['slug']);
                $slug = $response_data[0]['slug'];
                $documentUrl = "https://docuseal.co/d/{$slug}";
                return redirect()->away($documentUrl);

        } else {
            echo "Unexpected response format.";
        }
    } else {
        echo "Error decoding JSON: " . json_last_error_msg();
    }
}
