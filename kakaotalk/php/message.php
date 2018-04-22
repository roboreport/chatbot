
<?php

$data = json_decode(file_get_contents('php://input'),true);
$content = $data["content"];

switch($content)
{
	case "도움말":
		echo '
		{
			"message" : 
			{
				"text" : "도움말을 선택했습니다"
			},
			"keyboard" : 
			{
				"type": "buttons",
				"buttons" : [ "실거래가 도움말", "월세수익률 도움말"]
			}
		}'; 
	case "실거래가 도움말":
		echo '
		{
			"message" :
			{
				"text" : "국토교통부 실거래가 안내입니다"
			}
		}';
}


?>





