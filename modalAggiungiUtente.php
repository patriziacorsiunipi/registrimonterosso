<div class="modal fade" id="modaggiungiUtente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Aggiungi utente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErrore3" class="mb-3" style="color:red;"></div>
            <!-- Email -->
            <label class="font-weight-bold" for="emailAgg">Email</label>
            <input type="email" id="emailAgg" class="form-control mb-4" placeholder="" required>
            <!-- Nome -->
            <label class="font-weight-bold" for="nomeAgg">Nome</label>
            <input type="nome" id="nomeAgg" class="form-control mb-4" placeholder="" required>
            <!-- Password -->
            <label class="font-weight-bold" for="passwordAgg">Password</label>
            <input type="password" id="passwordAgg" class="form-control mb-4" placeholder="" required>
            <button id="aggiungiUtButton" class="btn unique-color text-white btn-block my-4" name="submit" type="submit">Aggiungi</button>
            <!-- Register -->
        </form>
      </div>
    </div>
  </div>
</div>
