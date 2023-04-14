
<header id="header" class="head">
<a class="h-logo pro" href="/" style="font-size: 18px; transition: 0.2s;">
  <div class="hv">
      <img style="vertical-align: middle;margin-left: 15px;" src="/assets/nivelo-2.svg" width="100px"></img>
  </div>
</a>

    
<nav>
  <ul class="nav_links">
    <?php
      if(isset($_SESSION["useruid"])){
        echo "<div class='disc' id='navlink' style='z-index: 1000;'>";
        echo "<li><a class='pro nlink' style='vertical-align: middle;' href='invite.php'>Opret nyt rum</a></li>";
        echo "<li><a class='pro nlink' style='vertical-align: middle;' href='/chat_room.php'>Chatrum</a></li>";
        echo "<li id='brd2' class='brd' style='vertical-align: middle;text-align: center;border-left: 1px solid var(--borderclr); height: 35px; margin: 0 0 0 20px;'></li>";
        echo "<li><a class='pro nlink' style='vertical-align: middle;' href='profile.php'>Konto </a><a style='vertical-align: middle;pointer-events:none;opacity:0.25'>({$_SESSION["useruid"]})</a> ";

      }
      else {
        echo "<div class='disc' id='navlink' style='z-index: 1000;'>";
        echo "<li><a class='pro nlink' style='vertical-align: middle;' href='/chat_room.php'>Chatrum</a></li>";
        
        echo "<li id='brd2' class='brd' style='vertical-align: middle;text-align: center;border-left: 1px solid var(--borderclr); height: 35px; margin: 0 0 0 20px;'></li>";
        echo "<li><a class='pro nlink' style='vertical-align: middle;' href='login.php'>Log på</a></li>";
        echo "<li><a class='modal-btn-header nlink' href='signup.php' style='vertical-align: middle;'>Tilmeld</a></li> </div>";

      }
    ?>
  </ul>
</nav>

</header>