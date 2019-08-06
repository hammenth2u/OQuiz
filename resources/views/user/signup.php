<?=view('layout.header').view('partials.nav')?>

<?php if (!empty($errorList)) : ?>
<div class="notification is-danger" role="alert">
    <button type="button" class="delete" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php foreach ($errorList as $currentError) : ?>
    <div><?= $currentError ?></div>
    <?php endforeach ?>
</div>
<?php endif ?>

<div class="container">
    <div class="columns is-centered">
    <div class="column is-half">
<form class="form-horizontal" action="" method="post">
<fieldset>

<!-- Text input-->
<div class="field">
  <label class="label" for="lastname">Nom</label>
  <div class="control">
    <input id="lastname" value="<?= $inputValues['lastname'] ?>" name="lastname" type="text" placeholder="Nom" class="input " required="">

  </div>
</div>

<!-- Text input-->
<div class="field">
  <label class="label" for="firstname">Prénom</label>
  <div class="control">
    <input id="firstname" value="<?= $inputValues['firstname'] ?>" name="firstname" type="text" placeholder="Prénom" class="input " required="">

  </div>
</div>

<!-- Password input-->
<div class="field">
  <label class="label" for="password">Mot de passe</label>
  <div class="control">
    <input id="password" name="password" type="password" placeholder="Mot de passe" class="input " required="">

  </div>
</div>

<!-- Password input-->
<div class="field">
  <label class="label" for="password2">Confirmation mot de passe</label>
  <div class="control">
    <input id="password2" name="password2" type="password" placeholder="Retaper votre mot de passe" class="input " required="">

  </div>
</div>

<!-- Prepended text-->
<label class="label" for="mail">Adresse e-mail</label>
<div class="field has-addons">
  <div class="control">
    <a class="button is-static">
      utilisateur@mail.com
    </a>
  </div>
  <div class="control">
    <input id="mail" value="<?= $inputValues['email'] ?>" name="mail" class="input " placeholder="Adresse e-mail" type="text" required="">
  </div>
</div>
<button type="submit" value="submit" class="button is-success is-outlined">S'enregistrer</a>

</fieldset>
</form>
</div>
</div>
</div>

<?=view('layout.footer')?>