<html>
<head>
	<title>Admin-MovieBooking</title>
    <link rel="stylesheet" href="adminStyles.css?v=<?php echo time(); ?>">

</head>

<body>
	<div class="header">
		<div class="header-item">
			<h2>BookMyMovie</h2>
		</div>
		<div class="header-item">
			<a id="menu-item" href="#">Logout</a>
		</div>
	</div>
	<div class="body-content">
        <div class="dash-head">
            <a id="menu-dash" href="admin.php">Movies</a>
			<a id="menu-dash" href="admin-add.php">Add Movie</a>
        </div>
        <div class="movieList">
			<?php
						
						include 'includes/config.php';
						$sel = "SELECT * FROM movies";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
							
			?>
			<div class="movies">
					<a href="booking.php?id=<?php echo $rws['movieID'] ?>">
						<img src="images/<?php echo $rws['image'];?>" width="200" height="200">
					</a>
					<div class="movie-details">
						<h3>
							<a href="#"><?php echo ''.$rws['movieName'];?></a>
							<br />
							<a target="_blank" href="<?php echo $rws['trailerURL'] ?>">Watch Trailer</a>
						</h3>
                        <h4>Cast :<?php echo $rws['cast'];?></h4>
                        <a href="editmovies.php?id=<?php echo $rws['movieID'] ?>">Edit </a><br />
                       
					</div>
			</div>
			<?php
                }
               
			?>
	</div>
</body>

</html>