<?php include "header.php"; 
    //PAGINATION NOT WORKING
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">

              <?php 
                include "config.php";
                $limit = 3;         //pagination

                if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else{
                    $page = 1;
                }

                $offset = ($page -1) * $limit;


                //preventing a normal user from seeing other admin's posts
                if($_SESSION["user_role"] == '1'){
                    //$sql = "SELECT * FROM filodb.post post 
                    //LEFT JOIN category ON post.category = category.category_id 
                    //LEFT JOIN user ON post.author = user.user_id
                    //ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                    $sql = "SELECT * FROM u_180023602_db.post post 
                    LEFT JOIN category ON post.category = category.category_id 
                    LEFT JOIN user ON post.author = user.user_id
                    ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                
                
                }elseif($_SESSION["user_role"] == '0'){
                    //$sql = "SELECT * FROM filodb.post post 
                    //LEFT JOIN category ON post.category = category.category_id 
                    //LEFT JOIN user ON post.author = user.user_id
                    //WHERE post.author = {$_SESSION['user_id']}
                    //ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";    

                    $sql = "SELECT * FROM u_180023602_db.post post 
                    LEFT JOIN category ON post.category = category.category_id 
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.author = {$_SESSION['user_id']}
                    ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";    
                }




                $result = mysqli_query($conn, $sql) or die("Problem in MySQL connection");
                if(mysqli_num_rows($result) > 0 ){

              ?>

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Airport</th>
                          <th>Date</th>
                          <th>Uploader</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)){?>

                          <tr>
                              <td class='id'><?php echo $row ['post_id']; ?></td>
                              <td><?php echo $row ['title']; ?></td>
                              <td><?php echo $row ['category_name']; ?></td>
                              <td><?php echo $row ['post_date']; ?></td>
                              <td><?php echo $row ['username']; ?></td>


                              <td class='edit'><a href='update-post.php?id=<?php echo $row ['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row ['post_id']; ?>&catid=<?php echo $row ['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  <?php ?>
                  <?php } 
                    try{
                        //Making Pagination for this page WORKING!
                        //$sql1 = "SELECT * FROM filodb.post";
                        $sql1 = "SELECT * FROM u_180023602_db.post";

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
                                echo '<li><a href="posts.php?page='.$i.'">  '.$i.'  </a></li>';

                            }

                            echo '</ul>';
                        }else{
                            throw new Exception($e);
                        }
                    }catch(Exception $e){
                        print_r($e);
                    }

                        ?>      

              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
