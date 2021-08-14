<?php include "header.php" ?>


<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Update Data</h1>
            </div>
            <?php

            include "php/connection.php";

            if (isset($_GET["id"])) {

                $id = $_GET["id"];

                $sql = "SELECT * FROM student WHERE id={$id}";
                $run_sql = mysqli_query($conn, $sql);
                if (mysqli_num_rows($run_sql) > 0) {
                    while ($row = mysqli_fetch_assoc($run_sql)) {

            ?>
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
                            <form action="php/update-data.php" method="POST">
                                <div class="form-group">
                                    <label for="">Enter Username</label>
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="id" class="form-control">
                                    <input type="text" value="<?php echo $row['username'] ?>" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Age</label>
                                    <input type="number" value="<?php echo $row['age'] ?>" name="age" id="age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter City</label>
                                    <input type="text" value="<?php echo $row['city'] ?>" name="city" id="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
            <?php

                    }
                }
            }


            ?>

        </div>
    </div>
</div>


<?php include "footer.php" ?>