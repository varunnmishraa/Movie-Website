<html>
<head>
	<title>MyMovieBooking</title>
	<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<div class="body-contents">		
		<div class="movieList">
			<?php						
				include 'includes/config.php';
				$sel = "SELECT * FROM movies";
				$rs = $conn->query($sel);
				while($rws = $rs->fetch_assoc()){
			?>
			<div class="movies">
				<a href="booking.php?id=<?php echo $rws['movieID'] ?>">
				<img src="images/<?php echo $rws['image'];?>" width="200" height="200">	</a>
				<div class="movie-details">
				<h3> <a href="booking.php?id=<?php echo $rws['movieID'] ?>"><?php echo ''.$rws['movieName'];?></a>
					<br />
					<a target="_blank" href="<?php echo $rws['trailerURL'] ?>">Watch Trailer</a>
				</h3>
				<h4>Cast :<?php echo $rws['cast'];?></h4>
				</div>
			</div>
			<?php
				}
			?>
			</div>
	</div>
</body>
</html>