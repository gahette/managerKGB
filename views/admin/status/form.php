<h2><?= isset($params['status']) ? e($params['status']->getName()) : 'Créer une nouvel état ' ?></h2>

<form
    action="<?= isset($params['status']) ? "/managerKGB/admin/status/edit/{$params['status']->getId()}" :
        "/managerKGB/admin/status/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="name"><strong>États</strong></label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?= isset($params['status']) ? e($params['status']->getName()) : '' ?>">
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['status']) ? 'Enregistrer les modifications' : 'Enregistrer l\'état' ?></button>
</form>
