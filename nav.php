<!-- Navigation in the header -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href=index.php>GUESTBOOK</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      
      <!-- Login system with a dropdown -->
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <span class="caret"></span></a>
        <ul class="dropdown-menu">
          

          <form action='login.inc.php' method='POST' class='form-inline'>
          <li><label for='first'> </label> <input type='text' class='form-control' name='uid' placeholder='Username'></li>
          <li><label for='pwd'> </label><input type='password' class='form-control' name='pwd' placeholder='Password'></li>
          <li><button type='submit' class='nav' formaction='login.inc.php' method='POST'>LOGIN</button></li></form>
        
        </ul>
      </li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user" type='submit'></span> Sign Up</a></li>

      <li><a href="logout.inc.php"><span class="glyphicon glyphicon-log-in" type='submit'></span> Logout</a></li>
    </ul>
  </div>
</nav>