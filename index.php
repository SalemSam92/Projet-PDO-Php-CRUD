<?php

require_once("db.php")
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion utilisateurs</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <header>
        <h1>Gestion des utilisateurs </h1>
    </header>

    <section>
        <h3>Formulaire de saisie</h3>

        <div class="box-form">
            <form action="" method="post">

                <input type="text" name="lastname" id="lastname" placeholder="Nom">
                <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                <input type="email" name="Mail" id="Mail" placeholder="Email">
                 <input type="text" name="zipCode" id="zipCode" placeholder="Code postal">
                <input type="date" name="DOB" id="DOB"> 
                <button type="submit" name="create" id="create">Ajouter un utilisateur</button>
            </form>

            <?php if (isset($error)) {
               echo $error;
               unset($error);
            } ?>
        </div>

        <div >

            <table class="table-user">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Date de naissance</th>
                        <th>Code postal</th>
                        <th>Modifier utilisateur</th>
                        <th>Supprimer utilisateur</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($users as $user) {
              
                    ?>
                    <tr>
                        <td><?php echo $user["lastname"] ?></td>
                        <td><?php echo $user["firstname"] ?></td>
                        <td><?php echo $user["Mail"] ?></td>
                        <td><?php echo $user["DOB"] ?></td>
                        <td><?php echo $user["zipCode"] ?></td>
                        <td>
                            <form action="update_user.php" method="post"> <button type="submit" name="update" id="update" value="<?php echo $user["id"] ?>">Modifier</button></form>
                        </td>
                        <td>
                            <form action="" method="post"> <button type="submit" name="delete" id="delete">Supprimer</button></form>
                        </td>
                    </tr> <?php } ?>

                </tbody>
            </table>
        </div>
    </section>


</body>

</html>