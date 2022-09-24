<?php
function testMessage($connection, $message){
    if ($connection) {
        echo "Successful $message";
    } else {
        echo "Unsuccessful $message";
    }
}
function path($go) {
    echo "<script>
    location.replace('/Registeration/$go')
    </script>";
}
?>