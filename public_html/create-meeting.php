<?php
require_once 'config.php';


function create_meeting() {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);

    $stemail = $_GET['email'];
    $topic = $_GET['topic'];
    $start_time = $_GET['start_time'];
    $db = new DB();
    $arr_token = $db->get_access_token();
    $accessToken = $arr_token->access_token;

    try {
        $response = $client->request('POST', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer $accessToken"
            ],
            'json' => [
                "topic" => $topic,
                "type" => 2,
                "start_time" => $start_time,
                "duration" => "30", // 30 mins
                "password" => "123456",
            ],
        ]);

        $data = json_decode($response->getBody());

        echo "You Meeting information is listed below. <br/><br/>";
        echo "<a href='$data->join_url'>$data->join_url</a>";
        echo "<script>location.href = 'mailto:,$stemail?subject=$topic&body=Your Meeting information is listed below %0D%0A %0D%0A $data->join_url %0D%0A'</script>";






    } catch(Exception $e) {
        if( 401 == $e->getCode() ) {
            $refresh_token = $db->get_refersh_token();

            $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
            $response = $client->request('POST', '/oauth/token', [
                "headers" => [
                    "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                ],
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token
                ],
            ]);
            $db->update_access_token($response->getBody());

            create_meeting();
        } else {
            echo $e->getMessage();
        }
    }
}

create_meeting();