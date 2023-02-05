<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "find_job";

function execute($sql)
{
    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) {
        echo 'Kết Nối Không Thành Công, Lỗi: ' . mysqli_connect_error();
    } else {
        // echo 'Kết Nối Thành Công';
        $arr = [];
        $sql2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sql2) > 0) {
            while ($row = mysqli_fetch_assoc($sql2)) {
                array_push($arr, $row);
            }
        }
        mysqli_close($conn);
        return $arr;
    }
}

function insertA($sql)
{
    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) {
        echo 'Kết Nối Không Thành Công, Lỗi: ' . mysqli_connect_error();
    } else {
        $sql2 = mysqli_query($conn, $sql);
        if ($sql2) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }
    }
}

function selectA($sql)
{
    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) {
        echo 'Kết Nối Không Thành Công, Lỗi:  ' . mysqli_connect_error();
    } else {
        $sql2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sql2) > 0) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }
    }
}

function countA($sql)
{
    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) {
        echo 'Kết Nối Không Thành Công, Lỗi:  ' . mysqli_connect_error();
    } else {
        $sql2 = mysqli_query($conn, $sql);
        return (int)$sql2;
    }
}
