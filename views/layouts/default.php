<!doctype html>
<html lang="fr" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css'?>" rel="stylesheet" type="text/css">

        <title>Gestion des données du KGB</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/managerKGB">Gestion des données du KGB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administration
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/managerKGB/admin/missions">Missions</a></li>
                                <li><a class="dropdown-item" href="/managerKGB/admin/countries">Pays</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
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

        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'main.js'?>"></script>
    </body>
</html>
