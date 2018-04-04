<?

// doc : https://dialogflow.com/docs/reference/agent/
// Get cURL resource
$curl = curl_init();

// Set some options - we are passing in a useragent too here
$accesstoken = "token";
$headr = array();
$headr[] = 'Content-type: application/json';
$header[] = 'Authorization:Bearer '.$accesstoken;

$query = "test";

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.dialogflow.com/v1/query?v=20170712&query='.$query.'&lang=ko&sessionId=9939&timezone=Asia/Seoul',
    CURLOPT_HTTPHEADER => $header
));

// Send the request & save response to $resp
$resp = curl_exec($curl);


// Close request to clear up some resources
print_r($resp);
curl_close($curl);
?>

