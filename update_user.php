<?php
require_once("db.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mise à jour utilisateur</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <section>
        <h3>Formulaire de modification</h3>

        <div class="box-form">
            <form action="index.php" method="post">

                <input type="text" name="lastname" id="lastname" value="<?php echo $user["lastname"] ?>" placeholder="Nom">
                <input type="text" name="firstname" id="firstname" value="<?php echo $user["firstname"] ?>" placeholder="Prénom">
                <input type="email" name="Mail" id="Mail" value="<?php echo $user["Mail"] ?>" placeholder="Email">
                <input type="text" name="zipCode" id="zipCode" value="<?php echo $user["zipCode"] ?>" placeholder="Code postal">
                <input type="date" name="DOB" id="DOB" value="<?php echo $user["DOB"] ?>">
                <button type="submit" name="confirm_update" id="confirm_update" value="<?php echo $user["id"] ?>">Valider saisie</button>
            </form>
        </div>
    </section>
</body>

</html>