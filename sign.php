
<!-- MODAL DI ACCESSO -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Accesso</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="">
          <div id="messaggioErrore2" class="mb-3" style="color:red;"></div>
            <!-- Email -->
            <input type="email" id="emailLog" class="form-control mb-4" placeholder="E-mail" required>
            <!-- Password -->
            <input type="password" id="passwordLog" class="form-control mb-4" placeholder="Password" required>
            <div>
              <div>
                <a  href="recuperoForm.php">Password dimenticata?</a>
              </div>
            </div>
            <button id="logButton" class="btn unique-color text-white btn-block my-4" name="submit" type="submit">Accedi</button>
            <!-- Register -->
        </form>
        <hr>
        <div class="container mt-0 mb-3 p-0">
          <p class="text-center" style="font-size:15px;">oppure</p>
          <?php
          include 'GoogleAccessSessions.php';
          echo ($login_button);
          ?>
        </div>
        <p style="font-size:13px;">Non sei registrato? <a class="text-primary" href="paginaRegistrazione.php">Registrati</a></p>
        <!-- Default form login -->
      </div>
    </div>
  </div>
</div>
<!-- modal di accesso -->
