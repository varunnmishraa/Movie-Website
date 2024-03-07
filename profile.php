<html>

<head>
	<title>MyMovieBooking</title>
	<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
		include 'header.php';
	?>
	<div class="body-content">
        <div id="book-movie">
            <?php
                        $userID = $_SESSION['userID'];
                        $mid = $_SESSION['mv_id'];
                        include 'includes/config.php';
						// $sel = "SELECT * FROM movies where movieID = '$mid'";
						// $rs = $conn->query($sel);
						// while($rws = $rs->fetch_assoc()){
			?>
               
                        <!-- <?php  ?> -->
                
                <?php
						
						include 'includes/config.php';
                        
                        $sel = "SELECT *
							FROM ticket
							LEFT JOIN movies
							ON ticket.movieID = movies.movieID
							WHERE ticket.userid = '$userID' ";
							$rs = $conn->query($sel);	
                        
                       if ($rs->num_rows > 0) {
                            echo '<h1>Your Ticket :</h1> <br />';
                            echo '<a href="index.php">Book another ticket?</a>';
						    while($rws = $rs->fetch_assoc()){
                                $tID =(int) $rws['ticketID'];
                                // var_dump($tID);

                                echo '<div class="ticket">';
                                echo ' <div id="movie-img">
                                    <img id="image-id" src="images/'. $rws['image'].'" width="200" height="200">
                                     </div>';
                                echo '<div id="ticket-details">';
                                
                                echo "<table>";
                                echo "<tr><td>BOOKING ID  </td><td>: 91yXwq3889uiop".$rws['ticketID'] ."</td></tr><tr><td>SCREEN </td><td>: ".$rws["screen"]."</td></tr><tr><td>SEATS </td><td>: ".$rws["seat"]."</td></tr><tr><td>DATE </td><td>: ".$rws['bdate']."</td></tr><tr></tr> <td>TIME </td><td>: ".$rws['btime']."</td></tr>";
                                echo '<form method="POST">';
                                echo '<button id="cancel-btn" type="submit" name="cancel" >Cancel Ticket</button>';
                                echo '</form>';
                                echo "</table>";
                                echo '<h1 id="movie-title">'.$tID.'</h1>';
                                echo '</div>';
                               
                               
                                echo '</div>';
                                
                                if(isset($_POST['cancel'])){
                                    include 'includes/config.php';
                                 
                                    $qry = "DELETE FROM `ticket` WHERE `ticket`.`ticketID` = '$tID'";
                       
                                        $result = $conn->query($qry);
                                        break;
                                   
                                   }
                        
                            }
                        }
                        else {
                                echo 'You haven\'t yet booked any tickets! <br />';
                                echo '<a href="index.php">Book now?</a>';
                            }
                    ?>
 
            
        </div>
	</div>
</body>
</html>