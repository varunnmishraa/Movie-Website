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
		<div class="movies">
            <?php
				$id = $_GET[id];
				$userID = $_SESSION['userID'];
				$_SESSION['mv_id'] = $id;
				include 'includes/config.php';
				$sel = "SELECT * FROM movies WHERE movieID = '$_GET[id]'";
				$rs = $conn->query($sel);
				$rws = $rs->fetch_assoc();
			?>
			<a href="booking.php?id=<?php echo $rws['movieID'] ?>">
			<img src="images/<?php echo $rws['image'];?>" width="200" height="200">
			</a>
			<div class="movie-details">
				<h1>
					<a href="booking.php?id=<?php echo $rws['movieID'] ?>"><?php echo ''.$rws['movieName'];?></a>
				</h1>
				<h2>Cast : <span class="property_size"><?php echo $rws['cast'];?></span></h2>
			</div>
			<h3>Proceed to Book <?php echo $rws['movieName'];?>. </h3>
                <?php
					if($_SESSION['email'] && ($_SESSION['pass'])){
				?>
                <form id="book-seats" action="#" method="POST">
				<input type="date" name="date" placeholder="Select date" class="booking-input" required/>
				<select name="time" class="booking-input">
					<option value="11:00 hrs">11:00 AM</option>
					<option value="14:30 hrs">02:30 PM</option>
					<option value="18:00 hrs">06:00 PM</option>
					<option value="22:00 hrs">10:00 PM</option>
				</select>
                <select id="screenID" name="screen" class="booking-input">
                    <option value="Theater A - Screen 2">Theater A - Screen 2</option>
                    <option value="Theater B - Screen 3">Theater B - Screen 3</option>
                    <option value="Theater C - Screen 1">Theater C - Screen 1</option>
                    <option value="Theater D - Screen 2">Theater D - Screen 2</option>                    
                </select>
                <br />
                <input type="number"  name="seats" placeholder="Number of seats" class="booking-input" id="totalSeats" min="1" maxlength="10" required/>
                <br/>
                
                <button type="submit"  name="book" class="booking-input" id="book-seats">Book now</button>
			</form>
            <?php
				} else{
			?>
				<a href="login.php">Click to login</a>
				<?php
						}
				?>
                <?php
					if(isset($_POST['book'])){
						include 'includes/config.php';
						$date = $_POST['date'];
						$time = $_POST['time'];
						$theatre = $_POST['screen'];
						$num_seats = $_POST['seats'];
					
						$qry = "INSERT INTO ticket (userid,movieID,fname,screen,seat,bdate,btime)
						VALUES('$userID','$id','$name','$theatre','$num_seats','$date','$time')";
						$result = $conn->query($qry);
						if($result == TRUE){
							
							echo "<script type = \"text/javascript\">
										alert(\"Successfully booked.\");
										window.location = (\"profile.php\")
										</script>";
						} else{
							// echo "Error: " . $qry . "<br>" . $conn->error;  
							echo "<script type = \"text/javascript\">							
										alert(\"Booking Failed. Try Again\");
										window.location = (\"booking.php\")
										</script>";							
						}
					}	
				?>			
		</div>
    </div>
</body>
</html>