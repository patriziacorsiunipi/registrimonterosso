<?php
  if (!isset($_SESSION["loginAmministratore"])){
    if(isset($_SESSION["loginUtente"])){
?>
<div class="modal fade" id="crowdMessaggio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header orange lighten-5">
        <h4 class="modal-title pl-3 font-weight-bold deep-orange-text">Crowdsourcing</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modalBoxMessaggio" class="modal-body mx-3">
        <form class="">
          <div class="form-group">
            <label for="messaggio">Lascia qui sotto il tuo suggerimento</label>
            <textarea class="form-control rounded-0" id="messaggio" rows="10"></textarea>
          </div>
          <button id="crowMessaggioInvia" class="btn orange darken-4 text-white btn-block my-4" name="submit" type="submit">Invia</button>
        </form>
        <div id="messaggioInviato" class="mb-3" style="color:green;"></div>
      </div>
    </div>
  </div>
</div>
<?php
}else{
?>
  <div class="modal fade" id="crowdMessaggio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header orange lighten-5">
          <h4 class="modal-title pl-3 font-weight-bold deep-orange-text">Crowdsourcing</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <form class="">
            <div class="form-group">
              <p>Se vuoi contribuire e lasciare un suggerimento <a class="text-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalLoginForm">accedi</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
  }
}
?>
