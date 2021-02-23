<?php
    ob_start();
    include('dblink.php');
    // include('parmition.php');

 if (!empty($_GET['ad_id'])) 
    {
        $id = $_GET['ad_id'];   
        $que="select * from admin_data where `id`='$id'";
        $que1=mysqli_query($con,$que);
        $que2=mysqli_fetch_array($que1);
    }

        include('header.php');
 ?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li><a href="admin-tables-data.php">UI Elements</a></li>
                                    <li class="active">Cards</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title pl-2"> <?php if ($que2['gender']=="male") {
                                    echo "Mr.";
                                } else {
                                    echo "Mrs.";
                                }
                                 ?> <?php echo $que2['name']; ?></strong> 
                                &nbsp&nbsp&nbsp&nbsp&nbsp<a href="admin-view-update.php?ad_id=<?php echo $que2['id']; ?>"><i class="fa fa-pencil-square-o"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/newimages/<?php echo $que2['image']; ?>" height="80px" width="80px" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $que2['name']; ?></h5>
                                   <table>
                                    <tr>
                                        <td>
                                            <div class="location text-sm-center"><i class="fa fa-envelope"></i></div>   
                                        </td>
                                        <td>
                                            <div class="location text-sm-center"><?php echo $que2['email']; ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="location text-sm-center"><i class="fa fa-mobile"></i></div>    
                                        </td>
                                        <td>
                                            <div class="location text-sm-center"><?php echo $que2['phone']; ?></div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="location text-sm-center"><i class="fa fa-graduation-cap"></i></div>    
                                        </td>
                                        <td>
                                            <div class="location text-sm-center"><?php echo $que2['education'];?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="location text-sm-center"><i class="fa fa-male"></i>/<i class="fa fa-female"></i>    
                                        </td>
                                        <td>
                                            <div class="location text-sm-center"><?php echo $que2['gender'];?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i></div>
                                        </td>
                                        <td>
                                        <div class="location text-sm-center"><?php echo $que2['city']; ?></div>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                                <hr>
                                <!-- <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="clearfix"></div>

     <?php
        include('footer.php');
    ?>
