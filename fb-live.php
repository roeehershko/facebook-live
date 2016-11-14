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
    $response = $fb->get('/1123749074341674?fields=reactions.type(HAHA).limit(0).summary(total_count).as(reactions_haha),reactions.type(LOVE).limit(0).summary(total_count).as(reactions_love)', '334030580299311|M6lEOkKdhPBDXG8N1n-3i4qwvoA');
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BvB</title>
    <style>
        .container {
            position: relative;
            font-family: Arial;
            width: 500px;
            height: 400px;
            background-image: url(bvb.jpg);
        }
        .results {
            position: absolute;
            color: #fff;
            font-size: 30px;
        }

        .results.haha {
            bottom: 6px;
            color: #fcd87a;
            font-weight: bold;
            width: 50%;
            left: 50%;
            text-align: center;
        }

        .results.love {
            bottom: 6px;
            left: 0;
            width: 50%;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="live-container">
        <div class="results love">
            <?= $haha_total ?>

        </div>
        <div class="results haha">
            <?= $love_total ?>
        </div>
    </div>
</div>
</body>
</html>