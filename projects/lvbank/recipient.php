<?php 
 if (!empty($_GET['account_name']) && !empty($_GET['account_number']) && !empty($_GET['bank_code'])){
$name=$_GET['account_name']; 
$account_number =$_GET['account_number']; 
$bank_code = $_GET['bank_code']; 

$url = "https://api.paystack.co/transferrecipient"; 
$fields=[
'type'=> "nuban",
'name' => $name, 
'account_number' => $account_number, 
'bank_code' => $bank_code, 
'currency'=> "NGN" 
];
$fields_string = http_build_query($fields); 

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL, $url); 
curl_setopt($ch,CURLOPT_POST, true); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields_string); 
curl_setopt ($ch, CURLOPT_HTTPHEADER, array( 
"Authorization: Bearer sk_test_5472e7cced04c2535e828fe2a699e1d6febc1cd6", 
"Cache-Control: no-cache", 
));

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec($ch); 

$info = json_decode($result); 
$recipient_name = $info->data->name; 
$recipient_code = $info->data->recipient_code; 
$type = $info->data->type; 
$Acct_Numb = $info->data->details->account_number; 
$Bank_Code = $info->data->details->bank_code; 
$Bank_Name = $info->data->details->bank_name; 
$currency = $info->data->currency; 
$createdAt = $info->data->createdAt; 

if($info->status){
include('database/mydb.php');

$stmt = $con->prepare("INSERT INTO transfer_recipient( account_name, recipient_code, ntype, account_number, bank_code, 
bank_name, currency, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); 
$stmt->bind_param("ssssssss", $recipient_name, $recipient_code, $type, $Acct_Numb, $Bank_Code, $Bank_Name, $currency,
$createdAt);
$stmt->execute();
if(!$stmt){
    echo'there was an error'.mysqli_error($con);
}
else{
    header('Location:initiate.php?recipient_code='.$recipient_code);
    exit();
}
}
}
 
else{
    header("Location: error.html");
    exit();
}

?>