<?php

$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$name = $_POST['people_name']; 


if(isset($_POST['people_actor'])){
    $actor = 1;

}else if(empty($_POST['people_actor']) == "false"){
    $actor = 0;

}else{
    echo "ERROR FATAL 404";
    
}

if(isset($_POST['people_director'])){
    $director = 1;

}else if(empty($_POST['people_director']) == "false"){
    $director = 0;

}else{
    echo "ERROR FATAL 404";

}

switch ($_GET['action']) {
    case 'add':
        $query = 'INSERT INTO
            people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("' . $name . '",
                 ' . $actor . ',
                 ' . $director . ')';
        break;
    case 'edit':
        $id = $_POST['people_id'];
        
        $query = 'UPDATE people
        
                SET people_fullname = "'. $name .'", people_isactor = '. $actor .', people_isdirector = '. $director .'
        
                WHERE people_id = '. $id .'';
    
        break;
}
    
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}

?>

<p style="text-align: center;">Your person has been updated. <a href="people.php">Return to Index</a></p>