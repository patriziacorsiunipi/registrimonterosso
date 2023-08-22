<div class="modal fade" id="modificaBattesimo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica registro dei battesimi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioErroreBatt" class="mb-3" style="color:red;"></div>
            <input type="text" id="idBattesimoMod" class="form-control hidden mb-4" value="" required>
            <label class="font-weight-bold" for="annoMod">Anno</label>
            <input type="text" id="annoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordAnnoMod">Ordine Anno</label>
            <input type="text" id="ordAnnoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="trascImmMod">Trascrizione-Immagine</label>
            <input type="text" id="trascImmMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="numRegMod">Numero registro</label>
            <input type="text" id="numRegMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordRegMod">Ordine registro</label>
            <input type="text" id="ordRegMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="sessoMod">Sesso</label>
            <input type="text" id="sessoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognomeMod">Cognome</label>
            <input type="text" id="cognomeMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeMod">Nome</label>
            <input type="text" id="nomeMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomePadreMod">Nome Padre</label>
            <input type="text" id="nomePadreMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognMadreMod">Cognome madre</label>
            <input type="text" id="cognMadreMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeMadreMod">Nome madre</label>
            <input type="text" id="nomeMadreMod" class="form-control mb-4" value="" required>
            <button id="modificaBattButton" class="btn btn-block unique-color text-white my-4">Modifica</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modificaMatrimonio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica registro dei matrimoni</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioMatrimoni" class="mb-3" style="color:red;"></div>
            <input type="text" id="idMatrimonio" class="form-control hidden mb-4" value="" required>
            <label class="font-weight-bold" for="annoMod">Anno</label>
            <input type="text" id="annoMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordAnnoMod1">Ordine Anno</label>
            <input type="text" id="ordAnnoMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="trascImmMod1">Trascrizione-Immagine</label>
            <input type="text" id="trascImmMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="numRegMod1">Numero registro</label>
            <input type="text" id="numRegMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordRegMod1">Ordine registro</label>
            <input type="text" id="ordRegMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognSposoMod">Cognome Sposo</label>
            <input type="text" id="cognSposoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeSposoMod">Nome Sposo</label>
            <input type="text" id="nomeSposoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="padreSposoMod">Padre Sposo</label>
            <input type="text" id="padreSposoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="etasoMod">Età Sposo</label>
            <input type="text" id="etasoMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognSposaMod">Cognome Sposa</label>
            <input type="text" id="cognSposaMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeSposaMod">Nome Sposa</label>
            <input type="text" id="nomeSposaMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="padreSposaMod">Padre Sposa</label>
            <input type="text" id="padreSposaMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="etasaMod">Età Sposa</label>
            <input type="text" id="etasaMod" class="form-control mb-4" value="" required>
            <button id="modificaMatrimoniButt" class="btn btn-block unique-color text-white my-4">Modifica</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modificaMorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header grey lighten-4">
        <h4 class="modal-title pl-3 font-weight-bold blue-grey-text">Modifica registro di morte</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form class="needs-validation">
          <div id="messaggioMorti" class="mb-3" style="color:red;"></div>
            <input type="text" id="idMorte" class="form-control hidden mb-4" value="" required>
            <label class="font-weight-bold" for="annoBattMod">Anno battesimo</label>
            <input type="text" id="annoBattMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="annoMorteMod">Anno morte</label>
            <input type="text" id="annoMorteMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordAnnoMod2">Ordine Anno</label>
            <input type="text" id="ordAnnoMod2" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="trascImmMod2">Trascrizione-Immagine</label>
            <input type="text" id="trascImmMod2" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="numRegMod2">Numero registro</label>
            <input type="text" id="numRegMod2" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="ordRegMod2">Ordine registro</label>
            <input type="text" id="ordRegMod2" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="sessoMod1">Sesso</label>
            <input type="text" id="sessoMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognomeMod1">Cognome</label>
            <input type="text" id="cognomeMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeMod1">Nome</label>
            <input type="text" id="nomeMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="fmMod">Figlio/Marito/Moglie</label>
            <input type="text" id="fmMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeConMod">Nome</label>
            <input type="text" id="nomeConMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomePadreConMod">Nome</label>
            <input type="text" id="nomePadreConMod" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomePadreMod1">Nome Padre</label>
            <input type="text" id="nomePadreMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="cognMadreMod1">Cognome madre</label>
            <input type="text" id="cognMadreMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="nomeMadreMod1">Nome madre</label>
            <input type="text" id="nomeMadreMod1" class="form-control mb-4" value="" required>
            <label class="font-weight-bold" for="etaMorteMod">Età morte</label>
            <input type="text" id="etaMorteMod" class="form-control mb-4" value="" required>
            <button id="modificaMorteButton" class="btn btn-block unique-color text-white my-4">Modifica</button>
        </form>
      </div>
    </div>
  </div>
</div>
