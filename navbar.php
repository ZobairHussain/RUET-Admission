<div class="row">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand visible-xs-inline-block nav-logo" href="/">
          <img src="/images/logo-dark-inset.png" class="img-responsive" alt="">
          </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav js-nav-add-active-class">
                    <li><a href="/01/index.php"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="notice.php">Notice board</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departments<b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="department.php">CSE</a></li>
                            <li><a href="department.php">EEE</a></li>
                            <li><a href="department.php">ECE</a></li>
                            <li><a href="department.php">ETE</a></li>

                            <li><a href="department.php">ME</a></li>
                            <li><a href="department.php">MTE</a></li>
                            <li><a href="department.php">CFPE</a></li>
                            <li><a href="department.php">GCE</a></li>
                            <li><a href="department.php">IPE</a></li>
                            <li><a href="department.php">CE</a></li>
                            <li><a href="department.php">BCM</a></li>
                            <li><a href="department.php">ARCHI</a></li>
                            <li><a href="department.php">URP</a></li>

                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li><a href="profile02.php"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['name'])) {echo " Hi ".($_SESSION['name']);} else {echo "Register"; } ?></a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span><?php if(isset($_SESSION['name'])) {echo "Log Out";} else {echo "LogIn"; } ?></a></li>

                </ul>
            </div>
        </div>
    </nav>
</div>
