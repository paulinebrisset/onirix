<?php
//vidéo Youtube sur le sujet
// $API_KEY = "nxZb2rL78yxunCTvGBkfT3BlbkFJKVuuHk1zHghdKTMWz8em" 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;
$config = json_decode(file_get_contents("./data/config.json"), true);
$API_KEY = $config["openaikey1"];
$organization = $config["organization"];
$url = $config["url2"];
// Create cURL session
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);

$headers = array( // cURL headers (-H)
    "Content-Type: application/json",
    // "OpenAI-Organization: $organization",
    "Authorization: Bearer $API_KEY"
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//Get initialization message (extract from Json file)
$init_message = $config["init_message"];


$data = array( // cURL data
    "model" => "gpt-3.5-turbo",
    "messages" => array(
        array(
            "role" => "system",
            "content" => $init_message
        ),
        array(
            "role" => "user",
            "content" => "J'ai rêvé que j'étais dans un village de bungalows et que je voyais des vieux amis à travers la fenêtre."
        )
    ),
    "temperature" => 0.5,   // temperature = creativity (higher value => greater creativity in your prompts)
    "max_tokens" => 250     // max amount of tokens to use per request
);
echo ("DATA");
var_dump($data);
echo ("<br/><br/>");

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

echo ("JSON ENCODE");
var_dump(json_encode($data));
echo ("<br/><br/>");
echo ("cURL ");
var_dump($curl);
echo ("<br/><br/>");
//execute cURL
$response = curl_exec($curl);
echo ('RESPONSE');
var_dump($response);
echo ("<br/><br/>");
$response = json_decode($response, true);   // extract JSON from response
echo ('RESPONSE');
var_dump($response);
echo ("<br/><br/>");

$generated_text = $response['choices'][0]['message']['content'];  // extract the generated response

echo $generated_text;   // output the generated response

curl_close($curl);      // close cURL session
