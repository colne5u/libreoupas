<?php

        function addAdmin() {
            $code =
                '<div class="col-lg-4 col-md-4 col-sm-4 form-group">
                    <div class="form-group">
                        <label for="descr">Accès administrateur :</label>
                        <input id="pwd" class="form-control" type="password" name="pwd" required>
                    </div>
                    <button onclick="authentify()" class="btn btn-default" type="submit">Valider</button>
                </div>';
            echo $code;
        }

?>
