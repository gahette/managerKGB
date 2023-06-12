<h2><?= isset($params['typeHideout']) ? e($params['typeHideout']->getName()) : 'Créer une nouveau type de planque' ?></h2>

<form
    action="<?= isset($params['typeHideout']) ? "/managerKGB/admin/typeshideouts/edit/{$params['typeHideout']->getId()}" :
        "/managerKGB/admin/typeshideouts/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="name"><strong>Types de planque</strong></label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?= isset($params['typeHideout']) ? e($params['typeHideout']->getName()) : '' ?>">
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['typeHideout']) ? 'Enregistrer les modifications' : 'Enregistrer le type de planque' ?></button>
</form>
