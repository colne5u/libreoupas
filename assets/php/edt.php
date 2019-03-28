<?php

    function addEdt($edt) {
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
                            ' . addCurrentEdt($edt) . '
                        </div>
                    </div>
                </div>
            </div>';
        echo $code;
    }

    function addCurrentEdt($edt) {
        $code = '';
        $i = 0;
        foreach ($edt as $name => $roomEdt) {
            $code = '<div class="row panel-heading';
            if ($libre[$name]) {
                $code = $code . ' panel-success">';
            } else {
                $code = $code . ' panel-danger">';
            }
            $code = '   <div class="col-lg-3">
                            <h3> ' . $name . ' <img src="assets/img/' . ($i < 7 ? 'Linux.png' : 'Windows.png') . '"/></h3>
                        </div>
                        <div class="col-lg-9">
                        </div>
                    </div>
                        ';
        }
        return $code;
    }

?>
