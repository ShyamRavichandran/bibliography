<?php

include 'dbc.php';
page_protect();
$user_email=$_SESSION['email'];
if(isset($_POST["action"])){

/** CREATE NEW LIBRARY  Code start**/
	if($_POST["action"]=="createlib"){
		$libname=$_POST["libname"];

		$sql_insert = "INSERT into `Library`
  			(`DisplayName`,`OwnerEmail`
			)
		    VALUES
		    ('$libname','$user_email'
			)
			";

          mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
		  echo "Library Created, Library ID:".mysql_insert_id();
		exit();
	}
/** CREATE NEW LIBRARY  Code END**/

/** Load LIBRARY  Code start**/	
	if($_POST["action"]=="loadlib"){
		$result = mysql_query("SELECT `Library` . * FROM `Library` WHERE `OwnerEmail` = '$user_email' OR `ID` IN ( SELECT ID FROM SharedLibrary WHERE `ShareEmail` = '$user_email')"); 
$num = mysql_num_rows($result);

		// Match row found with more than 1 results  - the user is authenticated. 
		if ( $num > 0 ) {
			$result_out='';
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$result_out.= "<option value='".$row['ID']."'>".$row['DisplayName']."</option>";
			}

		}
		else {$result_out="<option>No Library on Your name</option>";}
		echo $result_out;
	}
/** Load LIBRARY  Code END**/	


/** Add reference  Code start**/
if($_POST["action"]=="addreference"){
		$libid=$_POST["libid"];
	    $add_author=$_POST["add_author"];
	$add_title=$_POST["add_title"];
	$add_abstract=$_POST["add_abstract"];
	$add_year=$_POST["add_year"];
	$add_pdf=$_POST["add_pdf"];
	$add_url=$_POST["add_url"];

		$sql_insert = "INSERT into `Reference`
  			(`Author`,`Abstract`,`PDF`,`Title`,`URL`,`YEAR`,`SharedLibraryID`
			)
		    VALUES
		    ('$add_author','$add_abstract','$add_pdf','$add_title','$add_url','$add_year','$libid'
			)
			";

          mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
		  echo "Reference Added, Reference ID:".mysql_insert_id();
		exit();
	}
/** Add reference  Code End**/


/** Share Library  Code Start **/	
if($_POST["action"]=="sharelib"){
$toshare=$_POST["emailtoshare"];
$sharelibid=$_POST["libshareid"];
	

	$result = mysql_query(" SELECT * FROM SharedLibrary WHERE `ShareEmail` = '$toshare' and ID = '$sharelibid' "); 
$num = mysql_num_rows($result);

		// Match row found with more than 1 results  - the user is authenticated. 
		if ( $num > 0 ) {
echo "library is already Shared with this email"; exit(0);
			}
		else {
				
			$sql_insert = "INSERT into `SharedLibrary`
  			(`ID`,`ShareEmail`
			)
		    VALUES
		    ('$sharelibid','$toshare'
			)
			";

          mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
		  echo "Library Shared";
		exit();
		}
}

}
?>