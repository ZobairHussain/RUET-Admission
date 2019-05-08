<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-user"></i> Hi <?php echo $_SESSION['username']; ?> </a>
            <a class="navbar-brand" href="message.php"><i class="fa fa-commenting"></i> Messages</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="ruet.php"><i class="fa fa-plus-square"></i> Add RUET Result</a></li>
                <li><a href="hsc.php"><i class="fa fa-user-plus"></i> Add HSC Result</a></li>
                <li><a href="alloteDept.php"><i class="fa fa-user-plus"></i> Alloted Dept </a></li>
                <li><a href="edit.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="login.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
