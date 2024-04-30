   <?php
    session_start();
    ?>

   <nav>
       <div id="nav-left">
           <a href="index.php">
               <div id="logo"></div>
           </a>
           <div id="menu">
               <ul id="menu-list">
                   <li><a href="tracker.php">My Tracker</a></li>
                   <li><a href="contact.php">Contact</a></li>
               </ul>
           </div>
       </div>
       <div id="nav-right">
           <?php
            if (!isset($_SESSION['user'])) { ?>
               <a href="register.php">
                   <button type="button" id="register-btn">SIGN UP</button>
               </a>
               <a href="login.php">
                   <button type="button" id="login-btn">LOGIN</button>
               </a>
           <?php } else { ?>
               <a href="logout.php">
                   <button type="button" id="login-btn">LOGOUT</button>
               </a>
           <?php } ?>
       </div>
       <?php
        if (!isset($_SESSION['user'])) { ?>
           <div id="hamburger">
               <a href="javascript:void(0);" onclick="toggleNavigator()">
                   <img src="images/burger.svg" alt="">
               </a>
           </div>
       <?php } else { ?>
           <a href="logout.php">
               <button type="button" id="login-btn-responsive">LOGOUT</button>
           </a>
       <?php } ?>

   </nav>
   <div id="side-menu" class="hide-nav">
       <div id="side-menu-links">
           <ul id="menu-list">
               <li><a href="tracker.php">My Tracker</a></li>
               <li><a href="contact.php">Contact</a></li>
           </ul>
       </div>
       <div id="side-menu-register">
           <a href="register.php">
               <button type="button" id="register-btn">SIGN UP</button>
           </a>
           <a href="login.php">
               <button type="button" id="login-btn">LOGIN</button>
           </a>
       </div>
   </div>