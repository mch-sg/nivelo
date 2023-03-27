<header id="header" class="head">
    <a class="h-logo pro" href="/" style="font-size: 18px; transition: 0.2s;">
        <!-- <img src="https://res.cloudinary.com/coolors/image/upload/t_60x60/v1636729140/live/custom-avatars/fzhn1oqool8tpb2am7hx.jpg"></img> -->
    Webportal
    </a>

    
    <nav>
        <ul class="nav_links">
            <!-- <li>
                <div class="divclr">
                    <a id="p1" class="diva" href="#">Projects</a>
                    <a id="p2" class="divb bi bi-chevron-down"></a>
                </div>
            </li> -->
            
            <!-- <li><a class="pro" href="/invite.php">Inviter</a></li>
            <li><a class="pro" href="/sidebar-prototype.php">Chat</a></li> -->

            <?php
                if(isset($_SESSION["useruid"])){
                    echo "<li><a class='pro' href='invite.php'>Inviter</a></li>";
                    echo "<li><a class='pro' href='/chat_room.php'>Chat</a></li>";
                    echo "<li><a class='pro' href='profile.php'>Profil</a></li>";
                    echo "<li><a class='pro' href='db/includes/logout.inc.php'>Log ud</a></li>";
                }
                else{
                    echo "<li><a class='pro' href='/sidebar-prototype.php'>Chat</a></li>";
                    echo "<li><a class='pro' href='signup.php'>Tilmeld</a></li>";
                    echo "<li><a class='pro' href='login.php'>Log på</a></li>";
                }
            ?>
        </ul>
    </nav>


    <!-- <a href="#" class="cta">
    <div class="profilepicture">
        <img src="https://res.cloudinary.com/coolors/image/upload/t_60x60/v1636729140/live/custom-avatars/fzhn1oqool8tpb2am7hx.jpg"></img>
        </div>
    </a> -->


</header>