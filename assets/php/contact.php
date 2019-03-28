<?php

        function addContact() {
            $code =
                '<form class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8" action="assets/php/action/mailSender.php" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="descr">Quelque chose à nous dire ?</label>
                            <input class="form-control" type="text" name="subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="contact" rows="10" cols="50" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Email : </label>
                            <input class="form-control" type="email" name="sender" required>
                        </div>
                        <h6>libreoupas s\'engage à utiliser ton mail uniquement pour te répondre.</h6>
                        <button class="btn btn-default" type="submit">Valider</button>
                   </div>
              </form>';
            echo $code;
        }

?>
