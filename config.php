<?php
    	$conn = new mysqli('localhost','root','', 'movie_ticket');
        if($conn->connect_error){
            echo "Failed:" . $conn->connect_error;
        }
?>