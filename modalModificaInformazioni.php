<div class="modal fade" id="modificaInformazioni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica informazioni su atti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErrore6" class="mb-3" style="color:red;"></div>
            <input type="id" id="idInfoMod" class="form-control hidden mb-4" value="" required>
            <!-- info -->
            <label class="font-weight-bold" for="infoMod">Informazioni</label>
            <input type="text" id="infoMod" class="form-control mb-4" value="" required>
            <button id="modificaInfoButton" class="btn btn-block unique-color text-white my-4">Modifica</button>
            <!-- Register -->
        </form>
      </div>
    </div>
  </div>
</div>
