<?php

require_once 'utils.php';
use function Utils\create_directory;

enum LogLevel: string
{
    case DEBUG = "DEBUG";
    case INFO = "INFO";
    case WARNING = "WARNING";
    case ERROR = "ERROR";
    case CRITICAL = "CRITICAL";
}

class Logger
{
    private string $logFilePath;

    public function __construct()
    {
        $fileName ??= 'log_' . date('Y-m-d') . '.json';

        $this->logFilePath = __DIR__ . '/../../logs/' . basename($fileName);
        create_directory(dirname($this->logFilePath));

        if (!file_exists($this->logFilePath)) {
            file_put_contents($this->logFilePath, json_encode([]));
        }
    }

    public function log(LogLevel $level, string $message): void
    {
        $fp = fopen($this->logFilePath, 'c+');
        if ($fp === false) {
            return;
        }

        flock($fp, LOCK_EX);

        $logs = json_decode(stream_get_contents($fp), true) ?? [];
        $logs[] = [
            'timestamp' => date('c'),
            'level'     => $level->value,
            'message'   => $message,
        ];

        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

        flock($fp, LOCK_UN);
        fclose($fp);
    }

    public function getLogFilePath(): string
    {
        return $this->logFilePath;
    }
}