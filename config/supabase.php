<?php
// config/supabase.php

define('SUPABASE_URL', 'https://uutmzhhlqmqggwzgbcnv.supabase.co');


define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InV1dG16aGhscW1xZ2d3emdiY252Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE1NjI5ODAsImV4cCI6MjA5NzEzODk4MH0.P-_KvsP9DHIEVanknf8mwk6Vxa8JrvSyDE5mf4cBZsc');


function supabase_get($table, $query = '') {
    $url = SUPABASE_URL . "/rest/v1/" . $table . ($query ? "?" . $query : "");
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . SUPABASE_KEY,
        'Authorization: Bearer ' . SUPABASE_KEY,
        'Content-Type: application/json',
        'Prefer: return=representation'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code >= 200 && $http_code < 300) {
        return json_decode($response, true);
    } else {
        return [];
    }
}


function supabase_post($table, $data) {
    $url = SUPABASE_URL . "/rest/v1/" . $table;
    $payload = json_encode($data);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . SUPABASE_KEY,
        'Authorization: Bearer ' . SUPABASE_KEY,
        'Content-Type: application/json',
        'Prefer: return=representation'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return ($http_code >= 200 && $http_code < 300);
}
?>