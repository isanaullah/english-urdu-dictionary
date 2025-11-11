<?php
//METHOD FOR GET & POST DATA

function getvalue($action)
{
    $requestdata = array_merge($_POST, $_GET);

    if (array_key_exists($action, $requestdata)) {
        return $requestdata[$action];
    }
}
///////Fetch select data form query 

function fetch($sql_query)
{
    return $query = mysqli_fetch_array($sql_query);
}
