<div class="modal fade" id="modificaAmministratore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica amministratori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErrore6" class="mb-3" style="color:red;"></div>
            <input type="id" id="idMod" class="form-control hidden mb-4" value="" required>
            <!-- Email -->
            <label class="font-weight-bold" for="emailMod">Email</label>
            <input type="email" id="emailMod" class="form-control mb-4" value="" required>
            <!-- Nome -->
            <label class="font-weight-bold" for="nomeMod">Nome</label>
            <input type="nome" id="nomeMod" class="form-control mb-4" value="" required>
            <!-- Password -->
            <label class="font-weight-bold" for="passwordMod">Password</label>
            <input type="text" id="passwordMod" class="form-control mb-4" value="" required>
            <button id="modificaAmButton" class="btn btn-block unique-color text-white my-4">Modifica</button>
            <!-- Register -->
        </form>
      </div>
    </div>
  </div>
</div>
