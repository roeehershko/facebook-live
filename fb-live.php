<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BvB</title>
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <style>
        .container {
            position: relative;
            font-family: Arial;
            width: 580px;
            height: 277px;
            background-image: url(uvu.jpg);
        }
        .results {
            position: absolute;
            color: #fff;
            font-size: 30px;
            background: rgb(224, 22, 12);
            margin-bottom: 12px;
            bottom: -27px;
        }

        .results.haha {
            color: #fcd87a;
            font-weight: bold;
            width: 50%;
            left: 50%;
            text-align: center;
            padding-left: 26px;
            box-sizing: border-box;
        }

        .results.love {
            left: 0;
            width: 50%;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            background: #009ada;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="live-container">
        <div class="results love">
            0

        </div>
        <div class="results haha">
            0
        </div>
    </div>
</div>
<script>
    setInterval(function () {
        $.ajax({
            url: './fb-live-api.php',
            success: function (res) {
                res = JSON.parse(res);
                $('.results.love').text(res.love);
                $('.results.haha').text(res.haha);
            }
        });
    }, 1000)
</script>
</body>
</html>