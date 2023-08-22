<div class="modal fade" id="modificaBattesimoMorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica corrispondenze</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErrore8" class="mb-3" style="color:red;"></div>
            <input type="text" id="idBattesimo1Mod" class="form-control hidden mb-4" value="" required>
            <label class="font-weight-bold" for="IDMorteMod">IDMorte</label>
            <input type="text" id="IDMorte1Mod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="MorteIncertoMod">Incertezza Morte</label>
            <input type="text" id="MorteIncertoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="IDMatrimonioMod">IDMatrimonio</label>
            <input type="text" id="IDMatrimonioMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="MatrimonioIncertoMod">Incertezza Matrimonio</label>
            <input type="text" id="MatrimonioIncertoMod" class="form-control mb-4" value="" required>
            <button id="modificaBattMorteButton" class="btn btn-block unique-color text-white my-4">Modifica</button>
            <!-- Register -->
        </form>
      </div>
    </div>
  </div>
</div>
