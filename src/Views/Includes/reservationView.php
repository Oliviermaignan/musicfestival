
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <h2 class="card-title">Merci <?= $user->getNom() . ' ' . $user->getPrenom() ?> pour votre réservation</h2>
          <p class="card-text">Un email de confirmation vous a été envoyé.</p>
        </div>
      </div>
      
      <div class="card mb-4">
        <div class="card-header">Récapitulatif</div>
        <div class="card-body">
          <p>Voici le récapitulatif de votre réservation :</p>
          
          <dl class="row">
            <dt class="col-sm-3">Identifiant</dt>
            <dd class="col-sm-9"><?= $reservation->getId() ?></dd>

            <dt class="col-sm-3">Quantité</dt>
            <dd class="col-sm-9"><?= $reservation->getQuantite() ?></dd>

            <dt class="col-sm-3">Casque</dt>
            <dd class="col-sm-9"><?= $reservation->getCasque() ?></dd>

            <dt class="col-sm-3">Luge</dt>
            <dd class="col-sm-9"><?= $reservation->getLuge() ?></dd>

            <dt class="col-sm-3">Identifiant utilisateur</dt>
            <dd class="col-sm-9"><?= $reservation->getIdUtilisateurs() ?></dd>

            <dt class="col-sm-3">Prix</dt>
            <dd class="col-sm-9"><?= $reservation->getPrix() ?></dd>

            <dt class="col-sm-3">Type de pass</dt>
            <dd class="col-sm-9"><?= $reservation->getTypeDePass() ?></dd>

            <dt class="col-sm-3">Type de nuitée</dt>
            <dd class="col-sm-9"><?= $reservation->getTypeDeNuitee() ?></dd>
          </dl>


          <dl class="row">
            <dt class="col-sm-3">Identifiant utilisateur</dt>
            <dd class="col-sm-9"><?= $user->getId() ?></dd>

            <dt class="col-sm-3">Nom</dt>
            <dd class="col-sm-9"><?= $user->getNom() ?></dd>

            <dt class="col-sm-3">Prénom</dt>
            <dd class="col-sm-9"><?= $user->getPrenom() ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?= $user->getEmail() ?></dd>

            <dt class="col-sm-3">Mot de passe</dt>
            <dd class="col-sm-9"><?= $user->getMotDePasse() ?></dd>
          </dl>


        </div>
      </div>
    </div>
  </div>
</div>

