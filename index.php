<?php

    if (isset($_COOKIE['smarf'])) {
        $smarf = intval($_COOKIE['smarf']);
        $smarf++;
        if ($smarf > 4) {
            $smarf = 1;
        }
    } else {
        $smarf = rand(1,4);        
    }

    setcookie('smarf', $smarf);

    $iDevice = false;
    if (stristr($_SERVER['HTTP_USER_AGENT'], 'iPad') !== FALSE || stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== FALSE || stristr($_SERVER['HTTP_USER_AGENT'], 'iPod') !== FALSE) {
        $iDevice = true;
    }

?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Too Many Smarfs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/smarf.css" rel="stylesheet" type="text/css" media="all">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <?php if (!$iDevice): ?>
            <script src="/smarf.js"></script>
        <?php endif; ?>
    </head>
    <body>
        <div id="container">
        <?php if (!$iDevice): ?>
            <video autoplay="autoplay" loop>
              <source src="/smarf<?php echo $smarf; ?>.mp4" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
        <?php else: ?>
            <img src="/smarf<?php echo $smarf; ?>.gif" width="100%" height="100%" />            
        <?php endif; ?>
        </div>
    </body>
</html>