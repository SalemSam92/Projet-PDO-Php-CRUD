<?php
if (isset($_POST["create"])) {
    if (
        isset($_POST["lastname"]) && empty($_POST["lastname"]) ||
        isset($_POST["firstname"]) && empty($_POST["firstname"]) ||
        isset($_POST["Mail"]) && empty($_POST["Mail"]) ||
        isset($_POST["DOB"]) && empty($_POST["DOB"]) ||
        isset($_POST["zipCode"]) && empty($_POST["zipCode"])
    ) {
        $error = "<p style=color:red;> Tous les champs doivent être rempli</p>";
        header("location:./index.php");
        exit;
    } else {
        $createUserRequest = $db->prepare("INSERT INTO user(lastname,firstname,Mail,DOB,zipCode) VALUES (:lastname,:firstname,:mail,:dob,:zCode)");
        $createUserRequest->bindParam(":lastname", $_POST["lastname"]);
        $createUserRequest->bindParam(":firstname", $_POST["firstname"]);
        $createUserRequest->bindParam(":mail", $_POST["Mail"]);
        $createUserRequest->bindParam(":dob", $_POST["DOB"]);
        $createUserRequest->bindParam(":zCode", $_POST["zipCode"]);

        $createUserRequest->execute();
    }
}

if (isset($_POST["delete"])) {
    $userDeleteRequest = $db->prepare("DELETE FROM user WHERE id = :id");
    $userDeleteRequest->bindParam(":id", $_POST["delete"]);
    $userDeleteRequest->execute();
}


if (isset($_POST["update"])) {
    $userToUpdateRequest = $db->prepare("SELECT *FROM user WHERE id = :id");
    $userToUpdateRequest->bindParam(":id", $_POST["update"]);
    $userToUpdateRequest->execute();
    $user = $userToUpdateRequest->fetch();
} else {
    $userRequest = $db->prepare("SELECT *FROM user");
    $userRequest->execute();
    $users = $userRequest->fetchAll();
}

if (isset($_POST["confirm_update"])) {
    $userUpdate = $db->prepare("UPDATE user SET lastname = :lastname, firstname = :firstname, Mail =:mail, DOB = :dob, zipCode = :zCode WHERE id = :id ");

    $userUpdate->bindParam(":id", $_POST["confirm_update"]);
    $userUpdate->bindParam(":lastname", $_POST["lastname"]);
    $userUpdate->bindParam(":firstname", $_POST["firstname"]);
    $userUpdate->bindParam(":mail", $_POST["Mail"]);
    $userUpdate->bindParam(":dob", $_POST["DOB"]);
    $userUpdate->bindParam(":zCode", $_POST["zipCode"]);

    $userUpdate->execute();
    $user = $userUpdate->fetchAll();
    header("location: ./index.php");
}
