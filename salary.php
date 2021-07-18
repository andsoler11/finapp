<?php require "./templates/headerFinapp.php" ?>
<?php require "./php/salaryPHP.php"; ?>

<header class="header">
        <div class="header-container">
            <div class="header-logo">
                <a href="index.php"><h1>Finapp</h1></a>
            </div>
            <ul class="header-ul">
                <li class="header-li">
                    <form method="POST">
                        <input type="submit" name="accion" value="Delete All">
                    </form>
                </li>
                <li class="header-li">
                    <a href="finapp.php">Home</a>
                </li>
                <li class="header-li">
                    <form method="POST">
                        <input type="submit" name="accion" value="Logout">
                    </form>
                </li>
                

            </ul>
        </div>
    </header>



    <div class="body-wraper">
        <div class="wrapper">
            <section class="form login">
            <a href="finapp.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <header>Enter Salary</header>

                <form method="POST">


                    <?php if (isset($message)) {?>
                        <div class="error-txt"><?php echo $message; ?></div>
                    <?php } ?>


                    <div class="field input">
                        <label>Salary:</label>
                        <input type="number" name="salary" placeholder="Enter your salary" required autocomplete="off">
                    </div>
    
                    <div class="field button">
                        <input type="submit" value="Submit" name="accion">
                    </div>
                    
                </form>

            </section>
        </div>
    </div>



<?php require "./templates/footer.php" ?>