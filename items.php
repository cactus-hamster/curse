<?php

    function sql_to_json($result)
    {
        if (isset($result)) {
            while ($data = mysqli_fetch_assoc($result)) {
                $rows[] = $data;
            }
            if (isset($rows))
                return $rows;
            else return [];
        }
        else
        {
            header("HTTP/1.0 404 Not Found");
        }
    }


    $lnk = @mysqli_connect("localhost", "me_user", "good", "curse") or die ('Cannot connect to server');
    mysqli_select_db($lnk, "curse") or die('Cannot open database');
    mysqli_set_charset($lnk, 'utf8');

    try {
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                if (isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                    if ($id != '')
                    {
                        $result = mysqli_query($lnk, "SELECT * FROM group_3133 WHERE id = $id");
                        print json_encode(sql_to_json($result)[0]);

                    }
                    else
                    {
                        $result = mysqli_query($lnk,"SELECT * FROM group_3133");
                        print json_encode(sql_to_json($result));
                    }
                }
                break;
            case "POST":
                $input = json_decode(file_get_contents("php://input"), true);

                $value = $input["value"];
                $id = $input["id"];
                mysqli_query($lnk,"UPDATE group_3133 SET value = \"$value\" WHERE id = $id;");
                break;
            case "DELETE":
                $id = $_GET["id"];
                mysqli_query($lnk,"DELETE FROM group_3133 WHERE id = $id");
                break;
            case "PUT":
                $input = json_decode(file_get_contents("php://input"), true);
                $value = $input["value"];
                mysqli_query($lnk,"INSERT INTO group_3133 (value) VALUES (\"$value\");");

                $result = mysqli_query($lnk,"SELECT * FROM group_3133 WHERE id = LAST_INSERT_ID()");
                print json_encode(sql_to_json($result)[0]);
                break;
            default:
                header('HTTP/1.1 405 Method Not Allowed');
        }
    }
    catch(Exception $e)
    {
        header('HTTP/1.1 500 Internal Server Error');
    }

?>