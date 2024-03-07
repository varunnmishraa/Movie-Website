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
            $movieId = $_GET['id'];
            $nameqry = "SELECT * FROM movies WHERE movieID = '$movieId'";
            $rs = $conn->query($nameqry);	

        
            //    var_dump($rs->fetch_assoc());
               $rws = $rs->fetch_assoc();
            // var_dump($rws);
            echo '<div id="edit">
            <h1>Edit movie information</h1>
            <form id="register-form" action="#" method="POST">
                        
            <table>
            <tr><td></td><td><button type="submit" class="login-input" name="delete" id="submit-btn">Delete</button></td></tr>
            <tr><td>
            <label for="title">Movie Title :</label></td><td>
            <input type="text" class="login-input" value="'.$rws['movieName'].'" id="name" name="title" placeholder="Movie name" required />
            </td></tr>
            <tr><td>
            <label for="cast">Movie Cast :</label></td><td>
            <input type="text" class="login-input" value="'.$rws['cast'].'" name="cast"  placeholder="Cast" required />
            </td></tr>
            <tr><td>
            <label for="releaseDate">Release Date :</label></td><td>
            <input type="date" class="login-input" value="'.$rws['releaseDate'].'" name="releasedate" placeholder="Release-date" required />
            </td></tr>
            <tr><td>
            <label for="url">Trailer URL :</label></td><td>
            <input type="text" class="login-input" value="'.$rws['trailerURL'].'" name="url" placeholder="Trailer URL" required />
            </td></tr>
            <tr><td>
            <label for="imagepath">Image Name :</label></td><td>
            <input type="text" class="login-input" value="'.$rws['image'].'" name="imagepath" placeholder="Image path" required />
            </td></tr>
            <tr><td></td><td><button type="submit" class="login-input" name="update" id="submit-btn">Update</button></td></tr>
            </table>           
        </form>
        </div>';

        if(isset($_POST['update'])){
            include 'includes/config.php';
            $title = $_POST['title'];
            $cast = $_POST['cast'];
            $date = $_POST['releasedate'];
            $url = $_POST['url'];
            $image = $_POST['imagepath'].'.jpg';

            $qry = "UPDATE movies SET `movieName` = '$title', `cast` = '$cast',`releaseDate`='$date',`trailerURL` = '$url',`image`='$image' WHERE  movieID = '$movieId'";
                

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
           if(isset($_POST['delete'])){
            include 'includes/config.php';
            $qry = "DELETE FROM movies WHERE  movieID = '$movieId'";
                

                $result = $conn->query($qry);

                if($result == TRUE){                               
                        echo "<script type = \"text/javascript\">
                                alert(\"Movie deleted successfully.\");
                                window.location = (\"admin.php\")
                                </script>";
                } else{
                    // echo "Error: " . $qry . "<br>" . $conn->error; 
                    echo "<script type = \"text/javascript\">
                                alert(\"Deletion failed\");
                                window.location = (\"editmovies.php\")
                                </script>";
                }
            
           }

            ?>
         

			
	</div>
</body>

</html>