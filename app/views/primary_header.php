<?php

    $greeting = (isset( $_SESSION['user_id']) && $_SESSION['user_id']) ? 'Logged in': 'Not logged in';


?>

<header>
        <div class="header text">
            <h1><i>mentorconnect.com</i></h1>
        </div>
        <?php if(isset( $_SESSION['user_id']) && $_SESSION['user_id']) { ?>
        <div class="surround">
            <button class="logOut">Log Out</button>   
        </div>
        <?php } else { ?>
        <div class="login">
            <?php echo $greeting; ?>
            <form action="login_ajax.php" method="POST">
                <button class="logIn" id="register">Log In</button>
                <input type="email" class="login-box" placeholder="Email Address" name="email" id="register">
                <input type="password" class="login-box" placeholder="Password" name="password" id="register">
            </form>
            
        </div>
        <?php } ?>

        
 </header>