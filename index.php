<?php include("header.php");
session_start(); ?>
<div class="container">
    <div class="card">
        <?php
        include "php/connection.php";
        $sql1 = "SELECT * FROM student";
        $run_sql1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_num_rows($run_sql1);
        ?>
        <h4>student ( <?php echo  $row1; ?> )</h4>
            <a href="add-data.php"><button class="btn btn-success">Add Student</button></a>
    </div>
</div>
<div class="container">
    <form action="./searching-data.php">
        <input type="text" name="search" placeholder="Seach Here...." id="search" class="form-control">
        <button class="btn btn-success">search</button>
    </form>
</div>
<div class="container">
    <?php

    if (isset($_SESSION["success"])) {
    ?>
        <div class="alert-success">
            <h5><?php echo $_SESSION["success"]; ?></h5>
        </div>
    <?php
        unset($_SESSION["success"]);
    }
    ?>

    <div class="table-responsive">
        <?php
        if(isset($_GET["page"])){
            $page=$_GET["page"];
        }else{
            $page = 1;
        }
        $limit = 3;
        $offset=($page - 1)*$limit;
        $sql = "SELECT * FROM student ORDER BY id DESC LIMIT $offset,$limit";

        $run_sql = mysqli_query($conn, $sql);
        if (mysqli_num_rows($run_sql) > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Student Name</th>
                        <th>Student Age</th>
                        <th>Student City</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($run_sql)) { ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["age"] ?></td>
                            <td><?php echo $row["city"] ?></td>
                            <td><a href="./edit-data.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="./php/delete-data.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }

        // to make pagination
        $sql1 = "SELECT * FROM student";
        $run_sql1 = mysqli_query($conn, $sql1);
        $total_record = mysqli_num_rows($run_sql1);
        $total_page = ceil($total_record / $limit);
        ?>
        <div class="container">
            <div class="pagination">
                <?php
                if($page > 1){
                   echo "<a href='index.php?page=".($page - 1)."' class='btn btn-success'>Prev</a>";
                }
                for ($i = 1; $i < $total_page; $i++) {
                    if($i==$page){
                        $active="active";
                    }else{
                        $active="";
                    }
                
                   echo  "<a href='index.php?page=".$i."' class='btn btn-success {$active}'>{$i}</a>";
                }
                if($i>$page){
                    echo "<a href='index.php?page=".($page + 1)."' class='btn btn-success'>Next</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>