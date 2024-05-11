<html>
    <head>
        <link rel="stylesheet" href="adminmain.css">
    </head>
    <body style="background-image: url(Images/hand.png);">
        <ul>
            <li class="dropdown"><p style="font-family: cursive;font-size: 40px;color: white;">ADMIN MODE</p></li>
            <br>
            <h2>
                <li class="dropdown">
                    <br><br>
                    <a class="dropbtn" style="font-family: cursive;">DOCTOR</a>
                    <div class="dropdown-content">
                        <a href="NewDoctor.php" style="font-family: cursive;">Add new Doctor</a>
                        <a href="DeleteDoctor.php" style="font-family: cursive;">Delete Doctor</a>
                    </div>
                </li>
                

                <li>
                    <br><br>
                    <form method="POST" action="adminlogin.php">
                        <button type="submit" class="cancelbtn" name="logout" style="float: left;font-size: 20px;font-family: cursive;">LOGOUT</button>
                    </form>
                </li>
            </h2>
        </ul>
        
        <h1 style="font-family: cursive;font-size: 40px;color: black;">WELCOME ADMIN</h1>
    </body>
</html>