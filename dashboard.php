<?php    
    session_start();
    include 'connect.php';
    include 'readrecord.php';   
    require_once 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div style='background-color:#7c7c7c3b'>
        <center>
            <p style="color:white" style="font-size:1rem"><h2>List of Clients</h2></p>
        </center>
    </div>    

    <div class="buttons">
        <div class="record">
            <form method="POST"  onsubmit="return confirmLogout();">
                <div class="record">
                    <button type="submit" name="btnRecord">Add New Record</button>
                </div>
                <div class="logout">
                    <button type="submit" name="btnLogout" >Logout</button>
                </div> 
            </form>
        </div>

        <script>
            function confirmLogout() {
                return confirm('Are you sure you want to log out?');
            }
        </script>
        
    </div>
    
</body>
</html>

<div>
	
</div> 

 

<br>
    <div>        
        <table id="tbluser " class="table
        table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
            <thead>
                <tr> 
                    <th>User ID</th> 
                    <th>First Name</th> 
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Email</th>                     
                </tr> 
            </thead>  
            <tbody>
                <?php
                    while($row = $resultset->fetch_assoc()):
                    	$id = $row['userid'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $row['fname'] ?></td>
                    <td><?php echo $row['mname'] ?></td>
                    <td><?php echo $row['lname'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['mobilenumber'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                            <div class='buttons'>
                                <a href='update.php?updateid=" . $row["dorm_id"] . "' class='btnUpdate'>Update</a>
                                <a href='delete.php? deleteid=" . $row["dorm_id"] . "' class='btnDel' onclick='return confirmDelete()'>Delete</a>
                            </div>
                        </td>               
                </tr>
                <?php endwhile;?>
            </tbody>         
        </table>
        
    </div>

<?php

    if (isset($_POST['btnRecord'])){
        header("Location: register.php");
        exit();
    } else if (isset($_POST['btnLogout'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }

?>

<?php require_once 'includes/footer.php'; ?>