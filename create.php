<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once 'components/boot.php'?>
       <title>PHP CRUD  |  Add Blog Post</title>
       <style>
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }      
       </style>
   </head>
   <body>
       <fieldset>
           <legend class='h2'>Add Blog Post</legend>
           <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Name</th>
                        <td><input  class ='form-control' type="text"  name="name"  placeholder ="Product Name" /></td>
                   </tr>   
                   <tr>
                       <th>Date</th >
                       <td><input class= 'form-control' type="date"  name= "date" placeholder ="date" /></td>
                   </tr>
                   <tr>
                       <th>Picture</th >
                       <td><input class= 'form-control' type="file"  name="picture" /></td>
                   </tr>
                   <tr>
                       <th>Blog Text</th >
                       <td><input class= 'form-control' type="text"  name="text" /></td>
                   </tr>
                   <tr>
                       <td><button class ='btn btn-success' type= "submit">Insert New Blog Post</button></td>
                       <td><a href="index.php" ><button class= 'btn btn-warning' type= "button">Home</button></a></td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>