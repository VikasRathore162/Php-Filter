<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "sample"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//set variable
$Seat_Type = '';
$Quota = '';

// Get the county names from database - no duplicates
$query = "SELECT DISTINCT Seat_Type FROM `table 3`";
$query1 = "SELECT DISTINCT Quota FROM `table 3`";
// execute the query, $result will hold all of the Counties in an array
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);


while($row = mysqli_fetch_array($result)) {
    $Seat_Type .="<option>" . $row['Seat_Type'] . "</option>";
}
while($row = mysqli_fetch_array($result1)) {
    $Quota .="<option>" . $row['Quota'] . "</option>";
}

echo "<form name='search' method='post' action='file2.php'>
        <p><label>County</label></p>
        <input type='text' name='Rank' placeholder='Enter Your Rank'><br><br>
        <select name='Seat_Type' id='Seat_Type'>" . $Seat_Type . "</select>
        <select name='Quota' id='Quota'>" . $Quota . "</select>
        <input type='submit' name='search' value='Filter'><br><br>
        </form>";
