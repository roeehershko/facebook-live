<?php
require('vendor/autoload.php');

$fb = [
    'app_id' => '334030580299311',
    'page_id' => '1123720777677837',
    'app_secret' => 'c1993e824a42b548c85e109bf7380583'
];

$token = file_get_contents('https://graph.facebook.com/oauth/access_token?client_id=334030580299311&client_secret=c1993e824a42b548c85e109bf7380583&grant_type=client_credentials');
parse_str($token, $arr);

$fb = new Facebook\Facebook([
    'app_id' => '334030580299311',
    'app_secret' => 'c1993e824a42b548c85e109bf7380583',
    'default_graph_version' => 'v2.8'
]);

// 573576516163570_629760447211843
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/1126941527355762?fields=reactions.type(HAHA).limit(0).summary(total_count).as(reactions_haha),reactions.type(LOVE).limit(0).summary(total_count).as(reactions_love)', '334030580299311|M6lEOkKdhPBDXG8N1n-3i4qwvoA');
    $response = json_decode($response->getBody(), TRUE);

    $haha_total = isset($response['reactions_haha']['summary']['total_count'])? $response['reactions_haha']['summary']['total_count'] : 125;
    $love_total = isset($response['reactions_love']['summary']['total_count'])? $response['reactions_love']['summary']['total_count'] : 85;

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    $haha_total = 125;
    $love_total = 87;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    $haha_total = 125;
    $love_total = 87;
}

echo json_encode([
    'haha' => $haha_total,
    'love' => $love_total
]);