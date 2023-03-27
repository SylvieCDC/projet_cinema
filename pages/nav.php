
<nav>
    <img src="/projet_cinema/assets/images/logo.png" alt="logo">
        <div class="navbar" >

            <div class="gauche" id="sidemenu">

                <a href="/projet_cinema/index.php">Accueil</a>
                <a href="/projet_cinema/pages/films.php">Films</a>
                <a href="/projet_cinema/pages/contact.php">Contact</a>
                <a href="/projet_cinema/pages/ma_liste.php">Ma liste</a>
            </div>
            <div class="droite">
                
                <div class="search">
                        
                    <div class="searchbar"><input type="search" name="search" id="search" placeholder="Search" class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                
                
                <?php

                    if (isset($_SESSION['id_utilisateurs']))
                    {
                        // echo '<div class="session_pseudo">Bonjour'.' &nbsp;'.$_SESSION['pseudo'].' </div><a href="/projet_cinema/config/deconnx.php">Déconnexion</a>';  
                        echo '<a href="/projet_cinema/config/deconnx.php">Déconnexion</a>&nbsp;&nbsp;&nbsp;'.'<div class="session_pseudo">Bonjour'.' &nbsp;'.$_SESSION['pseudo'].'</div>';      
                    }
                    else {echo '<a href="/projet_cinema/pages/login.php">Se connecter</a>';}
                ?>
                
                <div class="session_avatar"><img src="/projet_cinema/assets/images/avatars/avatar-1.png" alt="images_profil"></div>
            </div>
            
        </div>
        
</nav>