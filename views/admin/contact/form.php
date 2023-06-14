<h2><?= isset($params['contact']) ? e($params['contact']->getLastname() . " " . $params['contact']->getFirstname()) : 'Créer un nouveau contact' ?></h2>

<form
    action="<?= isset($params['contact']) ? "/managerKGB/admin/contacts/edit/{$params['contact']->getId()}" :
        "/managerKGB/admin/contacts/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="lastname"><strong>Nom du contact</strong></label>
        <input type="text" class="form-control" id="lastname" name="lastname"
               value="<?= isset($params['contact']) ? e($params['contact']->getLastname()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="firstname"><strong>Prénom du contact</strong></label>
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="<?= isset($params['contact']) ? e($params['contact']->getFirstname()) : '' ?>">
    </div>
    <div class="form-group">
        <label for="date_of_birth"><strong>Date de naissance du contact</strong></label>
        <div class="datepicker date input-group">
            <input type="text"  class="form-control" id="date_of_birth" name="date_of_birth"
                   value="<?= isset($params['contact']) ? e($params['contact']->getDateOfBirth()) : '' ?>">
            <div class="input-group-append">

            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="name_code"><strong>Nom de code du contact</strong></label>
        <input type="text" class="form-control" id="name_code" name="name_code"
               value="<?= isset($params['contact']) ? e($params['contact']->getNamecode()) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="countries"><strong>Nationalité du contact</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php if (isset($params['contact'])): ?>
                        <?php foreach ($params['contact']->getCountries() as $agentCountry) {
                            echo ($country->getId() === $agentCountry->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $country->getNationalities() ?></option>
            <?php endforeach; ?>
        </select>
    </div>



    <button type="submit"
            class="btn btn-primary"><?= isset($params['contact']) ? 'Enregistrer les modifications' : 'Enregistrer le contact' ?></button>
</form>

