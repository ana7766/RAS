<?php
// Konfiguracija baze podataka
$host = "localhost";
$dbname = "vpmsdb"; 
$user = "root";
$password = ""; 

// API podaci
$apiKey = "53ded49e1c0eb0655f5e93dbb5beee83"; 
$city = "Bijeljina";
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=Bijeljina&appid=53ded49e1c0eb0655f5e93dbb5beee83&units=metric&lang=hr";

// Preuzimanje vremenskih podataka
$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die("Greška pri preuzimanju vremenskih podataka.");
}

// Parsiranje JSON odgovora
$data = json_decode($response, true);
if ($data === NULL || !isset($data['main'])) {
    die("Nevalidan odgovor sa API-ja.");
}

// Ekstrakcija potrebnih informacija
$temp = $data['main']['temp']; // Trenutna temperatura
$description = $data['weather'][0]['description']; // Opis vremena
$humidity = $data['main']['humidity']; // Vlažnost
$time = date("Y-m-d H:i:s");

// Konekcija sa bazom podataka
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom: " . $conn->connect_error);
}

// Upis podataka u bazu
$sql = "INSERT INTO weather (city, temperature, description, humidity, time) 
        VALUES ('$city', '$temp', '$description', '$humidity', '$time')";
if ($conn->query($sql) === TRUE) {
    echo "Podaci o vremenu su uspešno sačuvani.";
} else {
    echo "Greška pri upisu u bazu: " . $conn->error;
}

// Zatvaranje konekcije
$conn->close();
?>
