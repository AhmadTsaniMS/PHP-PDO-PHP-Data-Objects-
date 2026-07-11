<?php
/**
 * db.php
 */

// komentar tambahan

function db() {

    $hosts = ['127.0.0.1', 'localhost'];

    foreach ($hosts as $host) {

        try {

            $dsn = "mysql:host={$host};port=3306;dbname=webworkshop;charset=utf8mb4";

            return new PDO(
                $dsn,
                'wp_user',
                'wp_pass',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );

        } catch (Exception $e) {

        }
    }

    die("Database connection failed");
}
