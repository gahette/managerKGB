<!doctype html>
<html lang="fr" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
              crossorigin="anonymous">

        <!-- Appel de la Feuille de style minifiée De l'extension Datepicker -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
              integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>" rel="stylesheet" type="text/css">

        <title>Gestion des données du KGB</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/managerKGB">Gestion des données du KGB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (isset($_SESSION['auth'])): ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/managerKGB">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/missions">Les Missions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/countries">Les Pays</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/agents">Les Agents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/contacts">Les Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/targets">Les Cibles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/managerKGB/hideouts">Les Planques</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Administration
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/managerKGB/admin/missions">Missions</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/agents">Agents</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/contacts">Contacts</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/targets">Cibles</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/hideouts">Planques</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/status">États</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/countries">Pays</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/typesmissions">Types de mission</a>
                                </li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/specialities">Spécialité</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/typeshideouts">Types de
                                        planques</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['auth'])): ?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                                   aria-expanded="false">
                                    <?= $_SESSION['auth'][3] . ' ' . $_SESSION['auth'][2] ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a href="/managerKGB/users" class="nav-link">Profil</a></li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li><a href="/managerKGB/logout" class="nav-link">Se déconnecter</a></li>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!--                    <form class="d-flex" role="search">-->
                    <!--                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                    <!--                        <button class="btn btn-outline-success" type="submit">Search</button>-->
                    <!--                    </form>-->
                </div>
            </div>
        </nav>

        <div class="container">
            <?= $content ?>
        </div>

        <footer class="bg-light py-4 footer mt-auto">
            <div class="container">
                <?php if (defined('DEBUG_TIME')): ?>
                    page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?>ms
                <?php endif; ?>
            </div>
        </footer>


        <!--                <script src="-->
        <?php //= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'main.js'?><!--"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                crossorigin="anonymous"></script>
        <!-- Extension jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- Extension DATEPICKER -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!--                 Script pour activation du datepicker -->
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'script.js' ?>"></script>
    </body>
</html>
