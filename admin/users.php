<?php include "header.php"; 

if($_SESSION["user_role"] == '0'){
    header("Location: {$hostname}/admin/post.php");


}?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>

              <!-- Table Start to display all the users-->
              <div class="col-md-12">

              <?php 
                include "config.php";
                $limit = 3;

                if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else{
                    $page = 1;
                }
                
                $offset = ($page -1) * $limit;
                //$sql = "SELECT * FROM filodb.user ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
                $sql = "SELECT * FROM u_180023602_db.user ORDER BY user_id DESC LIMIT {$offset}, {$limit}";

                $result = mysqli_query($conn, $sql) or die("Problem in MySQL connection");

                if(mysqli_num_rows($result) > 0 ){

              ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>

                      <tbody>

                      <?php while($row = mysqli_fetch_assoc($result)){?>
                          <tr>
                              <td class='id'><?php echo $row['user_id']; ?></td>
                              <td><?php echo $row['first_name'] . " " . $row['last_name'] ;  ?></td>    <!-- Display name from MySQL-->
                              <td><?php echo $row['username'];  ?></td>
                              <td><?php 
                                    if($row['role'] == 1){
                                        echo "Admin";
                                    }

                                    else{
                                        echo "Normal User";
                                    }
                              
                              ?></td>

                              <!-- Pass ID to the URL of the user clicked on-->
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>          
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  
                <?php } 

                //Making Pagination for this page
                //$sql1 = "SELECT * FROM filodb.user";
                $sql1 = "SELECT * FROM u_180023602_db.user";
                $result1 = mysqli_query($conn, $sql1) or die("query failed");
                
                if(mysqli_num_rows($result1) > 0){
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil(($total_records/$limit));


                    for($i = 1; $i<=$total_page; $i++ ){
                        if($i == $page){
                            $active = "active";
                        }
                        else{
                            $active = "";
                        }

                        echo '<ul class="pagination admin-pagination">';
                        echo '<li><a href="users.php?page='.$i.'">  '.$i.'  </a></li>';

                    }

                    echo '</ul>';
                }

                ?>      

              </div>
          </div>
      </div>
  </div>
<?php include "header.php"; ?>
