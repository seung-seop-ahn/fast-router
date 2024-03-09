<?php

    require 'function.php';
    $res = (Object)Array();
    header('Content-Type: json');
    $req = json_decode(file_get_contents("php://input"));
    try {
        addAccessLogs($accessLogs, $req);
        switch ($handler) {
            case "index":
                echo "API Server";
                break;

            case "a":
                echo "호호호호호";

//        echo phpinfo();
                break;

            case "ACCESS_LOGS":
//            header('content-type text/html charset=utf-8');
                header('Content-Type: text/html; charset=UTF-8');

                getLogs("./logs/access.log");
                break;
            case "ERROR_LOGS":
//            header('content-type text/html charset=utf-8');
                header('Content-Type: text/html; charset=UTF-8');

                getLogs("./logs/errors.log");
                break;
            /*
            * API No. 0
            * API Name : 테스트 API
            * 마지막 수정 날짜 : 18.08.16
            */
            case "test":
                http_response_code(200);
                $res->result = test();
                $res->code = 100;
                $res->message = "테스트 성공";

                echo json_encode($res, JSON_NUMERIC_CHECK);

                break;



        }
    } catch (Exception $e) {

        return getSQLErrorException($errorLogs, $e, $req);
    }