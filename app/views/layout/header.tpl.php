<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/36e64eecae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>CFDR</title>
</head>

<body class="body">
    <header class="header">

        <img class="header-logo__thumbnail" src="/assets/images/CFDR_logo.png" alt="le logo du CFDR">

        <div class="menus-wrapper">

            <div  class="header-nav__icon">
                <i class="fa-solid fa-bars fa-2xl"></i>
            </div>
        
            <div class="header-register__wrapper">
                <div  class="header-register__icon">
                    <?php if (!empty($_SESSION)) :?>
                    <i class="fa-solid fa-unlock fa-2xl"></i>
                    <?php else :?>
                    <i class="fa-solid fa-lock fa-2xl"></i>
                    <?php endif ;?>
                </div>
                
                <nav class="header-register" id="header-register">
                    <ul class="header-register__items">
                        <?php if (!empty($_SESSION)) :?>
                        <a href="<?= $router->generate('appuser-logout')?>"><li class="header-register__item">Se&nbsp;déconnecter</li></a>
                        <?php else :?>
                        <a href="<?= $router->generate('appuser-login')?>"><li class="header-register__item">Se&nbsp;connecter</li></a>
                        <?php endif ;?>
                    </ul>
                </nav>
            </div>
        </div>     
    </header>
    
    <nav class="menu-nav" id="menu-nav">
        <ul class="menu-nav__items">
            <a href="<?= $router->generate('main-home')?>"><li class="menu-nav__item">Calendrier</li></a>
            <a href="<?= $router->generate('main-meteo')?>"><li class="menu-nav__item">Météo</li></a>
            <a href="<?= $router->generate('main-line_up')?>"><li class="menu-nav__item">Line-up</li></a>
            <a href="<?= $router->generate('main-standings')?>"><li class="menu-nav__item">Classement</li></a>
            <a href="<?= $router->generate('main-live')?>"><li class="menu-nav__item">Live</li></a>
            <?php  if(array_key_exists("userObject", $_SESSION)):?>
            <a href="<?= $router->generate('appuser-list')?>"><li class="menu-nav__item">Infos pilote</li></a>
            <?php if($_SESSION['userObject']->getRole() == 'admin'):?>
            <a href="<?= $router->generate('admin-spring')?>"><li class="menu-nav__item">Gérer le calendrier Spring</li></a>
            <a href="<?= $router->generate('admin-fall')?>"><li class="menu-nav__item">Gérer le calendrier Fall</li></a>
            <?php endif; endif;?>
        </ul>
        <img id="benjx" src="/assets/images/benjx_logo.png" alt="logo de la chaîne Twitch Benjxmotorsport">
    </nav>
        
    <main class="main">