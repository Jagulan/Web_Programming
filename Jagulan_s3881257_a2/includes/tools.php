<?php

// function to authenticate the login
function authenticate($username, $password){
    $usersFile = 'users.txt';

    if (file_exists($usersFile)) {
        $file = fopen($usersFile, 'r');
        if ($file) {
            while (($data = fgetcsv($file)) !== false) {
                list($storedUsername, $storedPassword) = $data;
                if ($username === trim($storedUsername) && $password === trim($storedPassword)) {
                    fclose($file);
                    return true; // Authentication successful
                }
            }
            fclose($file);
        }
    }

    return false; // Authentication failed
}

//function to format date to make it readable
function convert_date_format(string $date_str)
{
    $date = new DateTime($date_str);
    $day = $date->format('l');
    $day_of_month = $date->format('j');
    $month = $date->format('F');
    $year = $date->format('Y');

    return sprintf('%s, %sth %s %s', $day, $day_of_month, $month, $year);
}

?>
