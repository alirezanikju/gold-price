<?php

header("Content-Type : application/json");
if($_SERVER["REQUEST_METHOD"] === "POST"){

$rawData = file_get_contents("php://input");


$data = json_decode($rawData , true);

if(isset($data["amount"]) && is_numeric($data['amount'])){

$price = 2500000;
$amount = $data['amount'];

$total = $price * $amount;

echo json_encode([
    "status" => "ok",
    "price" => $price,
    "amount" => $amount,
    "totalPrice" => $total
], JSON_UNESCAPED_UNICODE);

}else{
    echo json_encode([
        "status" => "error",
        "msg" => "اون مقدار گرم لعنتی رو درست وارد کن"
    ], JSON_UNESCAPED_UNICODE);
}


}else{
    echo json_encode([
        "status"=> "error",
        "msg"=> "فقط با post کار میکنیم"
    ], JSON_UNESCAPED_UNICODE);
}

