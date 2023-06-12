<h2><?= isset($params['speciality']) ? e($params['speciality']->getName()) : 'Créer une nouvelle spécialité' ?></h2>

<form
    action="<?= isset($params['speciality']) ? "/managerKGB/admin/specialities/edit/{$params['speciality']->getId()}" :
        "/managerKGB/admin/specialities/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="name"><strong>Types de planque</strong></label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?= isset($params['speciality']) ? e($params['speciality']->getName()) : '' ?>">
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['speciality']) ? 'Enregistrer les modifications' : 'Enregistrer la spécialité' ?></button>
</form>
