<?php

    function addEdt($edt, $free, $type) {
        $code =
            '<div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
                                    <h3><span class="glyphicon glyphicon-education"></span>&#9;Salle</h3>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                    <h3><span class="glyphicon glyphicon-calendar"></span>&#9;EDT</h3>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-5 col-xs-12">
                                    <span class="spanFree"></span><b>Libre</b><span class="spanWFree"></span><b>Bientôt libre</b><span class="spanNFree"></span><b>Occupée</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="contained-fluid">
                            ' . addCurrentEdt($edt, $free, $type) . '
                        </div>
                    </div>
                </div>
            </div>';
        echo $code;
    }

    function addCurrentEdt($edt, $free, $type) {
        $code = '';
        $onlyLinux  = isset($_COOKIE["ONLY_LINUX"]) && $_COOKIE["ONLY_LINUX"];
        $onlyWindow = isset($_COOKIE["ONLY_WIN"])   && $_COOKIE["ONLY_WIN"];
        $onlyFree   = isset($_COOKIE["ONLY_FREE"])  && $_COOKIE["ONLY_FREE"];
        foreach ($edt as $name => $roomEdt) {
            if (($onlyLinux && $type[$name] == "Linux") || ($onlyWindow && $type[$name] == "Windows") || (!$onlyLinux && !$onlyWindow)) {
                if ($onlyFree && $free[$name] > 0 || !$onlyFree) {
                    $code = $code . '<div class="row panel';
                    if ($free[$name] == 0) {
                        $code = $code . ' nfree">';
                    } else if ($free[$name] == 1){
                        $code = $code . ' free">';
                    } else {
                        $code = $code . ' wfree">';
                    }
                    $code = $code .'
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <h5> ' . $name . ' <img src="assets/img/' . $type[$name] . '.png"/></h5>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">';
                    $start = 8;
                    $filler = 0;
                    asort($roomEdt);
                    foreach ($roomEdt as $range) {
                        $filler = intval($range['start'] - $start);
                        if ($filler > 0) {
                            $code = $code . '<div class="col-lg-' . $filler . ' col-md-' . $filler . ' col-sm-' . $filler . ' col-xs-' . $filler . '"></div>';
                        }
                        $size = intval(range['end'] - $range['start']);
                        $code = $code . '<div class="panel range col-lg-' . $size . ' col-md-' . $size . ' col-sm-' . $size . ' col-xs-' . $size . '"><div class="panel-heading">' . $range['text'] . '</div></div>';
                        $start = $start + $filler + $size;
                    }
                    $code = $code . '</div>
                            </div>
                                ';
                }
            }
        }
        return $code;
    }

?>
