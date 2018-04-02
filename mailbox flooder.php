<!DOCTYPE html>
<?//include_once('global.php');
echo"Type your HTML, CSS, JavaScript, Jquery or anything to compile it here in real time \n";
?>

<hr>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
</head>
<body>

<?php ob_start(); ?>
<div id='nameBox'></div>
<?//php $my_var = ob_get_clean(); 
//a query can be run to display all names containing these letters.
//echo $my_var;
/**
$message_query="SELECT * FROM Users WHERE username LIKE '%$my_var%'  ORDER BY username";
    //ORDER BY username
    $result = $con->query($message_query);
    if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc())
    {
        echo $row['username'];
    }
    }
    **/
?>

<textarea rows="14" cols="50" type='text' name='fname' onkeyUp="document.getElementById('nameBox').innerHTML = this.value" />
<?echo $a?>