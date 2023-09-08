<?php

namespace App\Controller;

class MessageController
{
    public function index()
    {
        if (isset($_GET['slack_name']) && isset($_GET['track'])) {
            $slackName = $_GET['slack_name'];
            $track = $_GET['track'];

            if (!empty($slackName) && !empty($track)) {
                $currentDay = date('l');
                $currentUTCTime = gmdate('Y-m-d\TH:i:s\Z');

                $response = [
                    'slack_name' => $slackName,
                    'current_day' => $currentDay,
                    'utc_time' => $currentUTCTime,
                    'track' => $track,
                    'github_file_url' => 'https://github.com/piouskenny/hngx_task_one/blob/main/app/controllers/MessageController.php',
                    'github_repo_url' => 'https://github.com/piouskenny/hngx_task_one',
                    'status_code' => 200
                ];

                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                http_response_code(400); 
                echo json_encode(['error' => 'Invalid parameters']);
            }
        } else {
            http_response_code(400); 
            echo json_encode(['error' => 'slack_name and track missing from the url parameter']);
        }
    }
}
