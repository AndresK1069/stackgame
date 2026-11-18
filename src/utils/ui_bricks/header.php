<?php

include_once __DIR__ . "/../core_bricks/utils.php";

use function Utils\write_line;
class header
{
    public string $title;
    public string $lang;
    public string $stylesheet;
    public array $extraElements;

    public function __construct(string $title, string $lang = "fr", string $stylesheet = "")
    {
        $this->title = $title;
        $this->lang = $lang;
        $this->stylesheet = $stylesheet;
        $this->extraElements = [];
    }

    public function addElement(string $element): void
    {
        $this->extraElements[] = $element;
    }

    public function render(): void
    {
        write_line('<!DOCTYPE html>');
        write_line(sprintf('<html lang="%s">', htmlspecialchars($this->lang)));
        write_line('<head>');
        write_line(sprintf('<meta charset="%s">', CHARSET));
        write_line(sprintf('<title>%s</title>', htmlspecialchars($this->title)));

        if (!empty($this->stylesheet)) {
            write_line(sprintf('<link rel="stylesheet" href="%s">', htmlspecialchars($this->stylesheet)));
        }

        foreach ($this->extraElements as $element) {
            write_line('    ' . $element);
        }

        write_line('</head>');
        write_line('<body>');
        write_line(sprintf('<h1>%s</h1>', htmlspecialchars($this->title)));
    }
}