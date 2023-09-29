<?php
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $file = fopen("orders.txt", "a");
    fwrite($file, "//// \n");
    fwrite($file, "Имя - ".$name . "\n");
    fwrite($file, "Телефон - ".$number . "\n");
    fwrite($file, "На - ".$date . " в - ". $time."\n");
    fwrite($file, "//// \n\n");
    fclose($file);

    echo "Спасибо за запись!";  
}

?>