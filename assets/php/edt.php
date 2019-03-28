<?php

    function addEdt() {
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
                        ' . addCurrentEdt() . '
                    </div>
                </div>
            </div>';
        echo $code;
    }

    function addCurrentEdt() {
        $code = "";
        $i = 0;
        foreach ($edt as $name => $roomEdt) {
            // code...
        }
        return $code;
    }

?>
