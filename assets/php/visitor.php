<?php

    // Total counter

    $counterFile;
    $counter = 0;
    if(!file_exists('visitor/total_visitor.txt')) {
        $counterFile = fopen('visitor/total_visitor.txt', 'a+');
    } else {
        $counterFile = fopen('visitor/total_visitor.txt', 'r+');
        $counter = fgets($counterFile);
    }

    $counter++;
    fseek($counterFile, 0);
    fputs($counterFile, $counter);
    fclose($counterFile);

    // Day counter

    $name = date("d_m") . ".txt";
    $counter = 0;
    if(!file_exists('visitor/day/' . $name)) {
        $counterFile = fopen('visitor/day/' . $name, 'a+');
    } else {
        $counterFile = fopen('visitor/day/' . $name, 'r+');
        $counter = fgets($counterFile);
    }

    $counter++;
    fseek($counterFile, 0);
    fputs($counterFile, $counter);
    fclose($counterFile);
?>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123954649-1 ');
</script>
