<?php
$link = mysqli_connect("localhost", "root", "", "summer2023");
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM users";
if($result = mysqli_query($link, $sql)){
   	 if(mysqli_num_rows($result) > 0)
          {  echo "<table>";
             echo "<tr>";
             echo "<th>id</th>";
             echo "<th>name</th>";
             echo "<th>email</th>";
             echo "<th>pass</th>";
             echo "<th>ip</th>";
             echo "<th>url</th>";
             echo "<th>dob</th>";
             echo "<th>gender</th>";            
             echo "<th>phone</th>";
             echo "<th>info</th>";
             echo "</tr>";
        		while($row = mysqli_fetch_array($result))
                         {           echo "<tr>";
		             echo "<td>" . $row['id'] . "</td>";
		             echo "<td>" . $row['name'] . "</td>";
                     echo "<td>" . $row['email'] . "</td>";
                     echo "<td>" . $row['pass'] . "</td>";
                     echo "<td>" . $row['ip'] . "</td>";
                     echo "<td>" . $row['url'] . "</td>";
                     echo "<td>" . $row['dob'] . "</td>";
                     echo "<td>" . $row['gender'] . "</td>";
                     echo "<td>" . $row['phone'] . "</td>";
                     echo "<td>" . $row['info'] . "</td>";
		             echo "</tr>";
		   }
	       echo "</table>";
	      mysqli_free_result($result);     
   	     } 
	     else{   echo "No records matching your query were found.";  }
}
else{  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);  }
mysqli_close($link);
?>