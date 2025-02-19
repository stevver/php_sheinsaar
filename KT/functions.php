<?php

function getDataFromCSV($filename) {
    $data = [];
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
            $data[] = [
                'image' => $row[0],
                'title' => $row[1],
                'subtitle' => $row[2],
                'text' => $row[3]
            ];
        }
        fclose($handle);
    }
    return $data;
}

function saveDataToCSV($filename, $data) {
    if (($handle = fopen($filename, 'w')) !== FALSE) {
        foreach ($data as $row) {
            fputcsv($handle, $row, ';');
        }
        fclose($handle);
    }
}