<h2><?= isset($params['country']) ? e($params['country']->getName()) : 'Créer une nouveau pays ' ?></h2>

<form
        action="<?= isset($params['country']) ? "/managerKGB/admin/countries/edit/{$params['country']->getId()}" :
            "/managerKGB/admin/countries/create" ?>"
        method="POST"
        onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="name"><strong>Pays</strong></label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?= isset($params['country']) ? e($params['country']->getName()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="nationalities"><strong>Nationalité</strong></label>
        <input type="text" class="form-control" id="nationalities" name="nationalities"
               value="<?= isset($params['country']) ? e($params['country']->getNationalities()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="iso3166"><strong>Code iso</strong></label>
        <input type="text" class="form-control" id="iso3166" name="iso3166"
               value="<?= isset($params['country']) ? e($params['country']->getIso3166()) : '' ?>">
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['country']) ? 'Enregistrer les modifications' : 'Enregistrer le pays' ?></button>
</form>
