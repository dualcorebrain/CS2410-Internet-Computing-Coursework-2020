<?php include 'header.php'; //CATEGORY PAGE ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                <?php   $sql1 = "SELECT * FROM category WHERE category_id = {$cat_id}";
                        $result1 = mysqli_query($conn, $sql1) or die("query failed");
                        $row1 = mysqli_fetch_assoc($result1); 

                ?>
                  <h2 class="page-heading"><?php echo $row1['category_name'];?></h2>
                  <?php
                        include "config.php";
                        if(isset( $_GET['cid'])){
                            $cat_id = $_GET['cid'];
                        }
                        $limit = 3;         //pagination's limit

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
        
                        }else{
                            $page = 1;          //Page number 1 otherwise
                        }
        
                        $offset = ($page -1) * $limit;      //Offset limit for pagination
                        
                        //$sql = "SELECT * FROM filodb.post post 

                        $sql = "SELECT * FROM u_180023602_db.post post 
                        LEFT JOIN category ON post.category = category.category_id 
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.category = {$cat_id}
                        ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                        $result = mysqli_query($conn, $sql) or die("Problem in MySQL connection");
                        if(mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                //Making tables dynamically pulled from database

                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="single.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'> <?php echo $row['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?php echo $row['username'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'], 0, 50) . " ...";?>    
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                        
                        <?php }
                        }
                        else{
                            echo "No record found in main index.php";
                        }


                        ?>

                        <?php

                        
                        //Making Pagination for this page, doesnt work 155

                        if(mysqli_num_rows($result1) > 0){
                            $total_records = $row1['post'];
                            $total_page = ceil(($total_records/$limit));        //Calculation for pagination's uppler limit


                            for($i = 1; $i<=$total_page; $i++ ){
                                if($i == $page){
                                    $active = "active";         //Active will allow Bootstrap to slightly darken the page currently clicked on 
                                }
                                else{
                                    $active = "";
                                }

                                echo '<ul class="pagination admin-pagination">';
                                echo '<li><a href="posts.php?page='.$i.'">  '.$i.'  </a></li>';

                            }

                            echo '</ul>';
                        }

                        ?>    

                        <!-- <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>    -->
                        </ul>
                    </div><!-- /post-container -->


                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
