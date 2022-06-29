<?php
include 'header.php';
include 'app/Config.php';
include 'app/SQLiteConnection.php';

?>

<body>
    <div>
        <?php
            $pdo = (new app\SQLiteConnection())->connect();
            // if ($pdo != null)
            //     echo 'Connection réussie';
            // else
            //     echo 'Whoopsie, connexion échouée';
            
            $query = $pdo->prepare('SELECT * FROM livres');
    
            try {

            $query->execute();
            
            } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
            }

            $livres = $query->fetchAll();

            foreach ($livres as $livre) {
                echo '<h1>' . $livre['titre'] . '</h1><br>';
            }
        ?> 
    </div>
</body>
</html>