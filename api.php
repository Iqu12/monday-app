<?php
if(isset($_POST['str'])) {
$ch = curl_init();
$str=$_POST['str'];
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata=array("model"=> "text-davinci-003",
"prompt"=> $str,
"temperature"=> 1,
"max_tokens"=> 2000,
"top_p"=> 1,
"frequency_penalty"=> 0,
"presence_penalty"=> 0);
$postdata=json_encode($postdata);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer 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';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
    $result=json_decode($result,true);
    echo'<pre>';
    print_r($result['choices'][0]['text']);
}
?>

<form method="post">
    <input type="text" name ="str" required>
    <input type="submit" name="submit" value="Enter">
</form>