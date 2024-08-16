<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM celebrities WHERE ID = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: home1.php");


}
?>
<style>
    *{font-size: 22px;color: black; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background-color: whitesmoke;margin: 20px;}
    button{background-color:lightgray;}
    button:hover{
        color: white;
        background-color: gray;
    }
    table{border: groove;width: 100%;text-align: center;padding:0px;}
    tr,td{padding: 10px;}


</style>
<html>

    <div>
    <h2>ASSETS AND COLLECTIONS</h2>

    <p>The assets and collection owned by the user :</p>
    </div>
    <table border="1px">
        <tr>
            <th>collection id</th>
            <th>name</th>
            <th>url</th>
            <th>type</th>
            <th></th>
        </tr>
        <?php
        $duplicate = mysqli_query($conn, "SELECT collection_id, name, url, type FROM collection WHERE id = '$id'");
        $row = mysqli_fetch_assoc($duplicate);
                if(mysqli_num_rows($duplicate) > 0){
                    while($row = mysqli_fetch_array($duplicate)){
                        echo "<tr>";
                        echo "<td>".$row["collection_id"]."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['url']."</td>
                        <td>".$row['type']."</td>
                        
                        </tr>";
            }
            echo "</table>";
        }

        ?>

</table>

</center>
</html>