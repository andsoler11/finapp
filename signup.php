<?php require "./templates/header.php"; ?>
<?php require "./php/signupPHP.php"; ?>






    <div class="body-wraper">
        <div class="wrapper">
            <section class="form signup">
                <header>Chat App</header>

                <form method="POST" enctype="multipart/form-data">

                    <?php if (isset($message)) {?>
                        <div class="error-txt"><?php echo $message; ?></div>
                    <?php } ?>

                    <div class="name-details">

                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="First Name" required>
                        </div>

                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </div>

                    </div>

                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter new password" required>
 
                    </div>

                    <div class="field input">
                        <label>Confirm Password</label>
                        <input type="password" name="passwordConfirm" placeholder="Enter new password" required>

                    </div>


                    <div class="field button">
                        <input type="submit" value="submit" name="accion">
                    </div>
                    
                </form>
                <div class="link">Already Signed up? <a href="./index.php">Login now</a></div>
            </section>
        </div>
    </div>



    <?php require "./templates/footer.php"; ?>