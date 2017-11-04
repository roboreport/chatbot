
<?php

include("./extract_info.php");




 
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
