<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>" rel="stylesheet" type="text/css">

        <title>Page 404</title>
        <style>
            .jumbotron {
                margin-top: 100px;
                padding: 4rem 2rem;
                margin-bottom: 2rem;
                background-color: $gray-100;
                border-radius: .3rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron text-center">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'sad.jpeg' ?>" alt="emoji-triste">
                <h1>404 PAGE NOT FOUND!</h1>
                <p>Cette page n'est pas disponible. Désolé pour ça.<br>
                    renouveler votre recherche.</p>
                <a href="/managerKGB/" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    retour</a>
            </div>
        </div>
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'main.js' ?>"></script>
    </body>
</html>
