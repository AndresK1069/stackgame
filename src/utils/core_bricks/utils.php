<?php

namespace Utils;

function create_directory(string $dir): void
{
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
}

function create_file(string $filePath, string $fileName): string
{
    if (!file_exists($filePath)) {
        create_directory($filePath);
    }
    $fullPath = rtrim($filePath, '/\\') . DIRECTORY_SEPARATOR . $fileName;
    $handle = fopen($fullPath, 'w');
    if ($handle !== false) {
        fclose($handle);
    }
    return $fullPath;
}

function append_line_to_file(string $filePath, string $line): bool
{
    $directory = dirname($filePath);
    create_directory($directory);
    return file_put_contents($filePath, $line . PHP_EOL, FILE_APPEND | LOCK_EX) !== false;
}

function generate_uuid(): string
{
    return bin2hex(random_bytes(16));
}

function write_line(mixed $text): void
{
    echo $text . PHP_EOL;
}