<?php

use function Utils\write_line;
class footer
{
    public string $copyrightText;
    public int $year;
    public string $className;
    public array $extraElements;

    public function __construct(string $copyrightText = "StackGame", int $year = 2026, string $className = "")
    {
        $this->copyrightText = $copyrightText;
        $this->year = $year;
        $this->className = $className;
        $this->extraElements = [];
    }

    public function addElement(string $element): void
    {
        $this->extraElements[] = $element;
    }

    public function render(): void
    {
        $classAttr = !empty($this->className) ? sprintf(' class="%s"', htmlspecialchars($this->className)) : '';

        write_line(sprintf('<footer%s>', $classAttr));

        foreach ($this->extraElements as $element) {
            write_line('    ' . $element);
        }

        write_line(sprintf(
            '  <p class="footer-brand"><a href="/"><img class="footer-logo" src="%s" width="28" height="28" alt="Logo %s"></a><span>© %d %s</span></p>',
            htmlspecialchars(LOGO_URL),
            htmlspecialchars(SITE_NAME),
            $this->year,
            htmlspecialchars($this->copyrightText)
        ));
        write_line('</footer>');
        write_line('</body>');
        write_line('</html>');
    }
}