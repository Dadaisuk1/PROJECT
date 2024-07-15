<?php    
    include 'connect.php';
    include 'readrecord.php';   
    require_once 'includes/header.php'; 
?>

<div>
    <link rel="stylesheet" href="css/dashboard.css">
</div>
    
<div>
	<button><a href="addrecord.php">Add New Client</a></button>
</div> 

<div>
	<button><a href="logout.php">Logout</a></button>
</div> 


<div style='background-color:#ffff00'>
    <center>
        <p style="color:white"><h2>List of Clients</h2></p>
    </center>
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

<?php require_once 'includes/footer.php'; ?>