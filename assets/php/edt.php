<?php

    function addEdt($edt, $libre) {
        $code =
            '<div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                    <h3><span class="glyphicon glyphicon-education"></span>&#9;Salle</h3>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                                    <h3><span class="glyphicon glyphicon-calendar"></span>&#9;EDT</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="contained-fluid">
                            ' . addCurrentEdt($edt, $libre) . '
                        </div>
                    </div>
                </div>
            </div>';
        echo $code;
    }

    function addCurrentEdt($edt, $libre) {
        $code = '';
        $i = 0;
        foreach ($edt as $name => $roomEdt) {
            $code = $code . '<div class="row panel';
            if ($libre[$name]) {
                $code = $code . ' free">';
            } else {
                $code = $code . ' nfree">';
            }
            $code = $code .'
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <h5> ' . $name . ' <img src="assets/img/' . ($i < 7 ? 'Linux.png' : 'Windows.png') . '"/></h5>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">';
            $debut = 8;
            $filler = 0;
            asort($roomEdt);
            foreach ($roomEdt as $range) {
                $filler = intval($range['debut'] - $debut);
                if ($filler > 0) {
                    $code = $code . '<div class="col-lg-' . $filler . ' col-md-' . $filler . ' col-sm-' . $filler . ' col-xs-' . $filler . '"></div>';
                }
                $size = $range['fin'] - $range['debut'];
                $code = $code . '<div class="panel range col-lg-' . $size . ' col-md-' . $size . ' col-sm-' . $size . ' col-xs-' . $size . '"><div class="panel-heading">' . $range['affichage'] . '</div></div>';
                $debut = $debut + $filler + $size;
            }
            $code = $code . '</div>
                    </div>
                        ';
            $i++;
        }
        return $code;
    }

?>
