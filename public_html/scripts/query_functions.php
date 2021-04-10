<?php
require_once('initialize.php');

//CONTAINS ALL FUNCTIONS FOR MANIPULATING THE DATABASE

function login_exists($email, $password) {
	global $db;

	$sql = "SELECT * FROM Tutor WHERE email='$email' AND password='$password'";

	$result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

  function find_all_users() {
    global $db;

    $sql = "select id, name, email, img ";
    $sql .= "from Tutor ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_user_by_id($id) {
    global $db;

    $sql = "select id, name, email, img ";
    $sql .= "from Tutor ";
    $sql .= "where id='" . $id . "' ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;

}

function insert_user($name, $email, $password, $img) {
    global $db;


    $sql = "INSERT INTO Tutor ";
    $sql .= " (name, email, password, img) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $email . "',";
	$sql .= "'" . $password . "',";
	$sql .= "'" . $img . "',";
    $sql .= ")";

	echo $sql;

    $result = mysqli_query($db, $sql);
	echo '$result is: ';
	print_r($result);
    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo 'Insert Error: ' . mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_user($user) {
    global $db;

    $sql = "UPDATE Tutor SET ";
    $sql .= "name='" . $user['name'] . "', ";
    $sql .= "email='" . $user['email'] . "', ";
    $sql .= "password='" . $user['password'] . "' ";
    $sql .= "img='" . $user['img'] . "' "; //TO DO: Image upload feature
    $sql .= "WHERE id='" . $user['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function delete_user($id) {
    global $db;

    if ($id < 0) {return true;}

    $sql = "DELETE FROM Tutor";
    $sql .= " WHERE id='" . $id . "'";
    $sql .= " LIMIT 1";

    $result = mysqli_query($db, $sql);


    // For DELETE statements, $result is true/false
    if($result) {
        mysqli_commit($db);
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


?>
