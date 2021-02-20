<?php
	ob_start();
	include('dblink.php');
	
	$name = $_SESSION['name'];

    $par = "select * from admin_data where `name`='$name'";
    $par1=mysqli_query($con,$par);
    $par2=mysqli_fetch_array($par1);

    if ($par2['logtip'] != 'admin') {

        $pars = "select * from hed ";
        $pars1=mysqli_query($con,$pars);
        $pars2=mysqli_fetch_array($pars1);

        $spars = "select * from hedtab ";
        $spars1=mysqli_query($con,$spars);
        $spars2=mysqli_fetch_array($spars1);

        if ($pars2['status'] == '1') {
            if ($spars2['status']=='1') {
            }
            else
            {
	           header('location:index.php');
            }   
        }
        // else
        // {   
        //        header('location:index.php');
        // }
        
        
    }

?>