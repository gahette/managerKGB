<h2><?= isset($params['typeMission']) ? e($params['typeMission']->getName()) : 'Créer une nouveau type de mission' ?></h2>

<form
    action="<?= isset($params['typeMission']) ? "/managerKGB/admin/typesmissions/edit/{$params['typeMission']->getId()}" :
        "/managerKGB/admin/typesmissions/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="name"><strong>Types de mission</strong></label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?= isset($params['typeMission']) ? e($params['typeMission']->getName()) : '' ?>">
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['typeMission']) ? 'Enregistrer les modifications' : 'Enregistrer le type de mission' ?></button>
</form>
