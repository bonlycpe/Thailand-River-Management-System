<?php
    //echo("Hello index");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db22_090";

    $conn = new mysqli($servername,$username,$password);
    $conn->set_charset("utf8");
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    //echo "<br> Successfully coneected to server <br>";

    if(!$conn->select_db($dbname)){
        //echo $conn->connect_error;
    }else{
        //echo "Successfully coneected to database <br>";
    }

    // $sql = "select qp_id,qp_qty from quotationproduct";
    // $result = $conn->query($sql);
    // echo "num rows=".$result->num_rows."<br>";
    // while($row=$result->fetch_assoc())
    // {
    //     echo "qp_id: ".$row["qp_id"];
    //     echo "qp_qty".$row["qp_qty"]."<br>";
    // }