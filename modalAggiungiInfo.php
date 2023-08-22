<div class="modal fade" id="modaggiungiInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Aggiungi informazione</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErrore15" class="mb-3" style="color:red;"></div>
            <!-- id -->
            <label class="font-weight-bold" for="idInfoAgg">ID Informazione</label>
            <input type="id" id="idInfoAgg" class="form-control mb-4" placeholder="" required>
            <!-- Informazione -->
            <label class="font-weight-bold" for="infoAgg">Informazione</label>
            <input type="text" id="infoAgg" class="form-control mb-4" placeholder="" required>
            <button id="aggiungiInfoButton" class="btn unique-color text-white btn-block my-4" name="submit" type="submit">Aggiungi</button>
            <!-- Register -->
        </form>
      </div>
    </div>
  </div>
</div>
