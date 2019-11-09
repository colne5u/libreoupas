<?php

        function addMaj() {
          $data = fopen('./visitor/total_visitor.txt', 'r+');
          $totalVisitor = fgets($data);
          fclose($data);

          $data = @fopen("./visitor/day/" . date("d_m") . ".txt", "r+");
          $toDayVisitor = "0";
          if ($data) {
              $toDayVisitor = fgets($data);
              fclose($data);
          }
          $code =
              '<div class="col-lg-12">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          <h3><span class="glyphicon glyphicon-bell"></span>&#9;Dernières mises à jour :</h3>
                      </div>
                      <div class="panel-body">
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">09/11 : Ajout section dernières mises à jour</li>
                              <li class="list-group-item">08/11 : Accès publique aux statistiques du site</li>
                              <li class="list-group-item">05/11 : Fix heure d\'hiver</li>
                          </ul>
                      </div>
                  </div>
              </div>';
          echo $code;
        }

?>
