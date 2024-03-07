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
        <div>
        <form id="register-form" action="#" method="POST">
            <h4 class="form-add">Add a new movie?</a></h4>
            <input type="text" class="login-input" id="name" name="title" placeholder="Movie name" required />
            <input type="text" class="login-input" id="age" name="cast" placeholder="Cast" required />
           
            <input type="date" class="login-input" id="email-register" name="releasedate" placeholder="Release-date" required />
            <input type="text" class="login-input" id="mobile" name="url" placeholder="Trailer URL" required />
           <input type="text" class="login-input" name="imagepath" placeholder="Image path" required />
            <button type="submit" class="login-input" name="add" id="submit-btn">Add movie</button>
        </form>
</div>

        </div>
        
</body>

</html>
<?php
						if(isset($_POST['add'])){
							include 'includes/config.php';
							$title = $_POST['title'];
							$cast = $_POST['cast'];
							$date = $_POST['releasedate'];
							$url = $_POST['url'];
							$image = $_POST['imagepath'].'.jpg';
                            
                                $qry = "INSERT INTO movies (`movieName`,`cast`,`releaseDate`,`trailerURL`,`image`)
                                VALUES('$title','$cast','$date','$url','$image')";

                                $result = $conn->query($qry);

                                if($result == TRUE){                               
                                        echo "<script type = \"text/javascript\">
                                                alert(\"Movie added successfully.\");
                                                window.location = (\"admin.php\")
                                                </script>";
                                } else{
                                    // echo "Error: " . $qry . "<br>" . $conn->error; 
                                    echo "<script type = \"text/javascript\">
                                                alert(\"Add failed\");
                                                window.location = (\"admin-add.php\")
                                                </script>";
                                }
                            
                       	}
						
					  ?>