<?php

    function addEdt($edt, $libre) {
        $code =
            '<div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3><span class="glyphicon glyphicon-education"></span>&#9;Salle</h3>
                                </div>
                                <div class="col-lg-9">
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
            $code = $code .'   <div class="col-lg-3">
                            <h3> ' . $name . ' <img src="assets/img/' . ($i < 7 ? 'Linux.png' : 'Windows.png') . '"/></h3>
                        </div>
                        <div class="col-lg-9">
                        </div>
                    </div>
                        ';
            $i++;
        }
        return $code;
    }

?>
