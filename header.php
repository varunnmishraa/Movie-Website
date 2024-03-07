
<?php
	session_start();
	error_reporting("E-NOTICE");
?>
<header>
<div class="header">
        <div class="header-item">
            <h2>BookMyMovie</h2>
        </div>

        <?php
						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
					?>
        <div class="header-item">
            <a id="menu-item" href="index.php">Home</a>
            <!-- <a id="menu-item" href="#">Movies</a> -->
            <a id="menu-item" href="login.php">Login</a>
        </div>
        <?php
                        }else{
                            ?>
                            <div class="header-item">
            <a id="menu-item" href="index.php">Home</a>
            <!-- <a id="menu-item" href="#">Movies</a> -->
            <a id="menu-item" href="profile.php">Profile</a>
            <a id="menu-item" href="login.php?logstate=logout">Logout</a>
        </div>
                  <?php      } ?>
    </div>
                        </header>