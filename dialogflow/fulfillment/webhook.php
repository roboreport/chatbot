
<?php


function getSellingPrice($type, $name)
{
        $conn = mysqli_connect('localhost', 'user', 'pwd', 'tutorial');
        if(mysqli_connect_errno($conn))
        {
                echo "connection fail:".mysqli_connect_error();
                return false;
        }

	
        if (!$conn->set_charset("utf8")) 
                    printf("Error loading character set utf8: %s\n", $conn->error);
	

        if(strcmp($type, "apt") == 0)
        {
                $query = "SELECT avg(`price`) as aprice from tutorial where name='$name'";
                #echo $query;
        }
        $result = mysqli_query($conn, $query);
        if(is_object($result))
        {
                $row = mysqli_fetch_assoc($result);
                $aprice = $row['aprice'];
        }
        else
        {
                $aprice = 0;
        }
        mysqli_close($conn);
        return $aprice;
}


function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook",
            "contextOut" => array()
        ));
    }
    else if($update["result"]["action"] == "getSellingPrice"){
	$price = getSellingPrice("apt", $parameters["parameters"]["apartmentname"]);
	//$price = 0;

	sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "실거래가는 $price 입니다",
            "displayText" => "실거래가는 $price 입니다",
            "contextOut" => array()
        ));
   }

}


 
function sendMessage($parameters) {
    echo json_encode($parameters);
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
?>
