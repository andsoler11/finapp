<?php require "./templates/header.php"; ?>
<?php require "./php/loginPHP.php"; ?>

<div class="body-wraper">
        <div class="wrapper">
            <section class="form login">
                <header>Finapp</header>

                <form method="POST">


                    <?php if (isset($message)) {?>
                        <div class="error-txt"><?php echo $message; ?></div>
                    <?php } ?>


                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye"></i>
                    </div>
    
                    <div class="field button">
                        <input type="submit" value="Continue to Finapp" name="accion">
                    </div>
                    
                </form>

                <div class="link">Not yet signed up? <a href="./signup.php">Signup now</a></div>
            </section>
        </div>
    </div>




<?php require "./templates/footer.php"; ?>