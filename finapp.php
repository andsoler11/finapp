<?php require "./templates/headerFinapp.php" ?>
<?php require "./php/finappPHP.php" ?>










    













    <header class="header">
        <div class="header-container">
            <div class="header-logo">
                <a href="finapp.php"><h1>Finapp</h1></a>
            </div>
            <ul class="header-ul">
                <li class="header-li">
                    <form method="POST">
                        <input type="submit" name="accion" value="Delete All">
                    </form>
                </li>
                <li class="header-li">
                    <a href="salary.php">Enter Salary</a>
                </li>
                <li class="header-li">
                    <form method="POST">
                        <input type="submit" name="accion" value="Logout">
                    </form>
                </li>
                

            </ul>
        </div>
    </header>

<div class="body-wraper-finapp">
    <div class="wrapper-finapp">
        <div class="wrapper-container">
            <div class="titles-container">
                <ul class="titles-nav">
                    <li class="titles">Money</li>
                    <li class="titles">Thing</li>
                    <li class="titles">Date</li>
                </ul>
            </div>

            <div class="table-container">
                <?php 

                    $total = 0;
                    if(isset($moneyData)){
                    foreach($moneyData as $data){ 

                ?>
                <div class="table-line">
                    
                    <div class="table-item"><?php  echo $data['money'] ?></div>
                    <div class="table-item"><?php  echo $data['thing'] ?></div>
                    <div class="table-item"><?php  echo $data['date'] ?></div>
                    <?php $total += intval($data['money']); ?>
                </div>
                <?php  } 
                    }
                ?>

            </div>

            <div>
                    <form method="POST" class="input-wrapper">
                        <input type="text" name="money" class="input" placeholder="Enter money" required autocomplete="off">
                        <input type="text" name="thing" class="input" placeholder="Enter things" required autocomplete="off">
                        <input type="submit" name="accion" value="enter" class="input-submit">
                    </form>
            </div>    
        </div>




        <div class="outputs-container">
            <div class="output-Total">
                <div class="output-total-title">Salary</div>
                <div class="output-total-data">
                    <?php
                    if(isset($salaryData)){
                        foreach ($salaryData as $data) { 
                         ?>
                    <p><?php echo $data['salary'] ?></p>
                    <?php } 
                        }
                    ?>
                </div>

            </div>

            <div class="output-Total">
            <div class="output-total-title">Total</div>
            <div class="output-total-data">
                    <p><?php  echo $total; ?></p>
                </div>
            </div>



        </div>

    </div>
</div>








<?php require "./templates/footer.php" ?>