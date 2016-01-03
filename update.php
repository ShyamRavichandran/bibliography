<html>
   <head>

      <title>Update reference</title>

   </head>
   <body>
   
   <h5>Update the refrence you choosed</h5>

      <?php
		 include 'dbc.php';
		          
		$id = $_REQUEST['id'];	
		
		if(isset($_POST['update']))
         {				  
            $emp_id = $_POST['emp_id'];

            $emp_salary = $_POST['emp_salary'];            
			
			//
			$libid=$_POST["libid"];
			$add_author=$_POST["add_author"];
			$add_title=$_POST["add_title"];
			$add_abstract=$_POST["add_abstract"];
			$add_year=$_POST["add_year"];
			$add_pdf=$_POST["add_pdf"];
			$add_url=$_POST["add_url"];
			
			$sql = "UPDATE Reference SET Author = '$add_abstract', Abstract='$add_author', PDF='$add_pdf',Title='$add_title',URL='$add_url',YEAR='$add_year' WHERE id = $id" ;
							
			  mysql_query($sql,$link) or die("Update Failed:" . mysql_error());
			  //echo "Reference Updated";
			//exit();
			//           
			header("Location: library.php");
          
         }

         else
         {

			$id = 0;
			$row = NULL;
			if ( !empty($_GET['id'])) {
				$id = $_REQUEST['id'];
			}
			
			$result = mysql_query("SELECT * FROM Reference WHERE id = '$id'"); 
			$num = mysql_num_rows($result);
			if ( $num > 0 ) {
			echo $id;
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo $row['Title'];
			}
			?>
			
             <form method="post" action="<?php $_PHP_SELF ?>">";
				
            <table border="3" bordercolor="white" bgcolor="lightgrey" width="60%" cellspacing="3" cellpadding="2" scrollbars="yes">
                <tr>
                    <td>Title</td> 
                    <td><textarea rows="1" cols="100" name="add_title" id="add_title"><?php echo $row['Title']; ?></textarea></td>

                </tr>
                <tr>
                    <td>Author</td> 
                    <td><textarea rows="1" cols="100" name="add_author" id="add_author"><?php $row['Author']; ?></textarea></td>

                </tr>
                <tr>
                    <td>Year</td> 
                    <td><textarea rows="1" cols="100" name="add_year" id="add_year" > <?php $row['Year']; ?> </textarea></td>
                </tr>
                <tr>
                    <td height="20">Abstract</td> 
                    <td><textarea rows="2" cols="100" name="add_abstract" id="add_abstract" ><?php $row['Abstract']; ?></textarea></td>
                </tr>
                
                <tr>
                    <td>Address</td> 
                    <td><textarea rows="1" cols="100" name="add_url" id="add_url"><?php $row['URL'];?></textarea></td>

                </tr>
				<tr>
                    <td></td> 
                    <td><input name="update" type="submit" id="update" value="Update"></td>

                </tr>
            </table>
        </div>
     
               </form>

		 <?php  }    
      ?>

   </body>

</html>