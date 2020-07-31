<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['Seat_Type'];
    $Quota1=$_POST['Quota'];
    $Rank=$_POST['Rank'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `table 3` WHERE  CONCAT(`Closing_Rank`,`Seat_Type`,`Quota`) AND
                                              (`Closing_Rank`>=$Rank AND `Seat_Type`= '$valueToSearch' AND `Quota`='$Quota1')";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `table 3`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "sample");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
            <table>
                <tr>
                    <th>Institute</th>
                    <th>Branch</th>
                    <th>Quota</th>
                    <th>Seat_Type</th>
                    <th>Opening_Rank</th>
                    <th>Closing_Rank</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Institute'];?></td>
                    <td><?php echo $row['Branch'];?></td>
                    <td><?php echo $row['Quota'];?></td>
                    <td><?php echo $row['Seat_Type'];?></td>
                    <td><?php echo $row['Opening_Rank'];?></td>
                    <td><?php echo $row['Closing_Rank'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

    </body>
</html>
