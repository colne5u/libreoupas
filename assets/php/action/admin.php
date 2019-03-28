<?php
    if ($_GET["pwd"] == 'nRbeJ6fLkhF5rkhGtm5yCKq89J75') {
        $data = fopen('../../../visitor/total_visitor.txt', 'r+');
        $totalVisitor = fgets($data);
        fclose($data);

        $data = @fopen("../../../visitor/day/" . date("d_m") . ".txt", "r+");
        $toDayVisitor = "0";
        if ($data) {
            $toDayVisitor = fgets($data);
            fclose($data);
        }
        $code =
            '<div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-stats"></span>&#9;Statistiques :</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre de visites totales : ' . $totalVisitor . '</li>
                            <li class="list-group-item">Nombre de visites journalières : ' . $toDayVisitor . '</li>
                            <li class="list-group-item">Le compteur de visites a été initialisé le 01/09/2018</li>
                        </ul>
                    </div>
                </div>
            </div>';
        echo $code;
    } else {
        $code =
            '<div class="col-lg-4 col-md-4 col-sm-4 form-group">
                <div class="form-group">
                    <label for="descr">Accès administrateur :</label>
                    <input id="pwd" class="form-control" type="password" name="pwd" required>
                </div>
                <button onclick="authentify()" class="btn btn-default" type="submit">Valider</button>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <a href="index.php">
                    <img src="assets/img/magic.jpg" class="img-responsive"/>
                </a>
            </div>';
        echo $code;
    }

?>
