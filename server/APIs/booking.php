<?php



// to determine what type requist
header("content-type: application/json");
// http_response_code(200);
function getusers(){
    $users = [
        ["username"=> 'turky', 'pasword'=> md5('turky123')],
        ["username"=> 'ahmed', 'pasword'=> md5('ahmed123')],
        ["username"=> 'jone', 'pasword'=> md5('jone123')],
    ];
    return json_encode($users);
}
echo getusers();

?>