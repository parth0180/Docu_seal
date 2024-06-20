<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocusealController extends Controller
{
    public function createAndRedirect()
    {
        $api_key = env('DOCUSEAL_API_KEY');
        $url = 'https://api.docuseal.co/submissions';

        // Data to be sent in the POST request
        $data = [
            "template_id" => 131466,
            "order" => "preserved",
            "submitters" => [
                [
                    "email" => "kkodhvani@gmail.com",
                    "fields" => [
                        [
                            "name" => "sname",
                            "default_value" => "galaxy school 2024",
                            "readonly" => true
                        ],
                        [
                            "name" => "director",
                            "default_value" => "mr.smith",
                            "readonly" => true
                        ],
                        [
                            "name" => "schoolyear",
                            "default_value" => "01/01/01",
                            "readonly" => true
                        ],
                        [
                            "name" => "attendece",
                            "default_value" => "70%",
                            "readonly" => true
                        ],
                        [
                            "name" => "childname",
                            "default_value" => "junior smith",
                            "readonly" => true
                        ],
                        [
                            "name" => "gender",
                            "default_value" => "gender",
                        ],

                        [
                            "name" => "phoneno",
                            "default_value" => "655464646581",
                            "readonly" => true
                        ],
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
            return response()->json(['error' => "cURL Error #: $err"]);
        } else {
            $response_data = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Check if the response has the expected structure
                if (isset($response_data['error'])) {
                    return response()->json(['error' => $response_data['error']]);
                } elseif (isset($response_data[0]['slug'])) {
                    $slug = $response_data[0]['slug'];
                    $documentUrl = "https://docuseal.co/s/{$slug}";


                    return redirect()->away($documentUrl);
                } else {
                    return response()->json(['error' => 'Unexpected response format.']);
                }
            } else {
                return response()->json(['error' => 'Error decoding JSON: ' . json_last_error_msg()]);
            }
        }
    }
}
