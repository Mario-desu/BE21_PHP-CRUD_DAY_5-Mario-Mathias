<?php 
session_start();
require_once 'actions/db_connect.php';
// if adm will redirect to dashboard
// if (isset($_SESSION['adm' ])) {
//     header("Location: dashboard.php");
//     exit;
//  }
 // if session is not set this will redirect to login page
 if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php" );
     exit;
 }


 if(isset($_SESSION['user'])) {
     $class = "d-none";
 }


$sql = "SELECT blog_content.ID, blog_content.name, blog_content.picture, blog_content.date, blog_content.text, user.first_name, user.last_name FROM blog_content
JOIN user ON blog_content.name = user.id";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {    
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
       $tbody .= "<tr>

            <td><img class='img-thumbnail' src='pictures/" .$row['picture']."'</td>
           <td>" .$row['name']."</td>
            <td>" .$row['date']."</td>
            <td>".$row['text']."</td>
           <td><a href='update.php?id=" .$row['ID']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id=" .$row['ID']."'><button class='btn btn-danger btn-sm ".$class."' type='button'>Delete</button></a></td>
           </tr>";
   };
} else {
   $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();


?>

<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
       <meta name="viewport"  content="width=device-width, initial-scale=1.0">
       <title>PHP CRUD</title>
       <?php require_once 'components/boot.php' ?>
       <style type= "text/css">
           .manageProduct {          
               margin: auto;
           }
           .img-thumbnail {
               width: 100px !important;
                height: 80px !important;
           }
           td {          
               text-align: left;
               vertical-align: middle;

            }
           tr {
               text-align: center;
           }
       </style>
   </head>
   <body>
   <header>
           <?php require_once "components/navbar.php" ?>
   </header>
       <div class="manageProduct w-75 mt-3" >   
           
           <p  class='h2'>Blog Posts</p>

            <table class='table table-striped'>
               <thead class='table-success' >
                   <tr>

                        <th>Picture</th>
                       <th>Name of Author</ th>
                       <th>Date Created</th>
                        <th>Text Created</th>
                        <th>Actions</th>
                   </tr>
               </thead>
               <tbody>
               <?php echo $tbody ?>
               </tbody>
            </table>
       </div>
    </body>
</html > 