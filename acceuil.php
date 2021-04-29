<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <div>
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                }
            ?>          
        </div>
    </body>
</html>