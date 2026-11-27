<?php

include_once __DIR__ . "/../core_bricks/utils.php";

use function Utils\write_line;
class header
{
    public string $title;
    public string $lang;
    public string $stylesheet;
    public array $extraElements;
    public bool $showTitle;

    public function __construct(string $title, string $lang = "fr", string $stylesheet = "", bool $showTitle = true)
    {
        $this->title = $title;
        $this->lang = $lang;
        $this->stylesheet = $stylesheet;
        $this->extraElements = [];
        $this->showTitle = $showTitle;
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

        write_line(sprintf('<link rel="icon" type="image/png" href="%s">', htmlspecialchars(LOGO_URL)));

        if (!empty($this->stylesheet)) {
            write_line(sprintf('<link rel="stylesheet" href="%s">', htmlspecialchars($this->stylesheet)));
        }

        foreach ($this->extraElements as $element) {
            write_line('    ' . $element);
        }

        write_line('</head>');
        write_line('<body>');
        if ($this->showTitle) {
            write_line('<div class="brand-hero">');
            write_line(sprintf(
                '  <a href="/"><img class="brand-hero-logo" src="%s" width="140" height="140" alt="Logo %s"></a>',
                htmlspecialchars(LOGO_URL),
                htmlspecialchars($this->title)
            ));
            write_line(sprintf('  <h1>%s</h1>', htmlspecialchars($this->title)));
            write_line('</div>');
        }
    }

    /** Logo + nom du site, cliquable, à placer à gauche dans la barre <header>. */
    public static function renderBrand(): void
    {
        write_line(sprintf(
            '<a class="brand" href="/"><img class="brand-logo" src="%s" width="44" height="44" alt=""><span class="brand-name">%s</span></a>',
            htmlspecialchars(LOGO_URL),
            htmlspecialchars(SITE_NAME)
        ));
    }
}