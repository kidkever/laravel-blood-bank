<?php


function responseJson($status, $msg, $data = null)
{
  $response = [
    'status' => $status,
    'msg' => $msg,
    'data' => $data
  ];

  return response()->json($response);
}

function sendNotification($device_tokens, $message)
{
  $SERVER_API_KEY = env('FCM_SERVER_API_KEY');

  $data = [
    "registration_ids" => $device_tokens,
    "data" => $message
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $SERVER_API_KEY,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  curl_close($ch);

  return responseJson(1, 'sucess', $response);
}
