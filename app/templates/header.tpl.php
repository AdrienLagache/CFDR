<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>CFDR</title>
</head>
<body class="body">
    <header class="header">

        <img class="header-logo__thumbnail" src="../images/CFDR_logo.png" alt="le logo du CFDR">

        <div class="menus-wrapper">

            <div class="menu">

                <!-- <img class="header-nav__icone" src="../images/icone-menu.png" alt="icone"> -->
                <div  class="header-nav__icone">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </div>

                <h3 class="header-nav__title">MENU</h3>
            </div>
        
            <div class="header-register__wrapper">
                <img class="header-register__icon" src="../images/profil-icon.png">
                <nav class="header-register" id="header-register">
                    <ul class="header-register__items">
                        <a href=""><li class="header-register__item">Se&nbsp;connecter</li></a>
                        <a href="./index.php"><li class="header-register__item">S'inscrire</li></a>
                    </ul>
                </nav>
            </div>
        </div>     
    </header>
    
    <nav class="menu-nav" id="menu-nav">
        <ul class="menu-nav__items">
            <a href="./admin"><li class="menu-nav__item">Infos pilote</li></a>
            <a href="./"><li class="menu-nav__item">Calendrier</li></a>
            <a href="./meteo"><li class="menu-nav__item">Météo</li></a>
            <a href="index.php?page=infos"><li class="menu-nav__item">Line-up</li></a>
            <a href="index.php?page=classements"><li class="menu-nav__item">Classement</li></a>
            <a href="./live"><li class="menu-nav__item">Live</li></a>
        </ul>
        <img id="benjx" src="../images/benjx_logo.png" alt="logo de la chaîne Twitch Benjxmotorsport">
    </nav>
        
    <main class="main">