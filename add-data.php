<?php include "header.php" ?>
<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Add Data</h1>
            </div>
            <div class="form-body">
                <?php
                if (isset($_SESSION["error"])) {
                ?>
                <div class="alert-danger">
                    <h5><?php echo $_SESSION["error"]; ?></h5>
                </div>
                <?php  
                unset($_SESSION["error"]);
                }
              
                ?>
                <form action="./php/insert-data.php" method="POST">
                    <div class="form-group">
                        <label for="username">Enter Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Enter Age</label>
                        <input type="number" name="age" id="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">Enter City</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>