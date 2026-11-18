<?php

use function Utils\write_line;

class NavItem
{
    public string $href;
    public string $label;
    public string $className;
    public array $attributes;

    public function __construct(string $href, string $label, string $className = "", array $attributes = [])
    {
        $this->href = $href;
        $this->label = $label;
        $this->className = $className;
        $this->attributes = $attributes;
    }
}

class Navbar
{
    public string $className;
    public array $items;

    public function __construct(string $className = "")
    {
        $this->className = $className;
        $this->items = [];
    }

    public function addItem(NavItem $item): void
    {
        $this->items[] = $item;
    }

    public function render(): void
    {
        $classAttr = !empty($this->className) ? sprintf(' class="%s"', htmlspecialchars($this->className, ENT_QUOTES, 'UTF-8')) : '';
        write_line(sprintf('<ul%s>', $classAttr));

        foreach ($this->items as $item) {
            $attributes = [
                'href' => $item->href,
            ];

            if (!empty($item->className)) {
                $attributes['class'] = $item->className;
            }

            $attributes = array_merge($attributes, $item->attributes);

            $renderedAttributes = [];
            foreach ($attributes as $attributeName => $attributeValue) {
                $escapedName = htmlspecialchars((string) $attributeName, ENT_QUOTES, 'UTF-8');
                if ($attributeValue === true) {
                    $renderedAttributes[] = $escapedName;
                } else if ($attributeValue !== false && $attributeValue !== null) {
                    $renderedAttributes[] = sprintf(
                        '%s="%s"',
                        $escapedName,
                        htmlspecialchars((string) $attributeValue, ENT_QUOTES, 'UTF-8')
                    );
                }
            }

            $attrString = !empty($renderedAttributes) ? ' ' . implode(' ', $renderedAttributes) : '';

            write_line(sprintf(
                '  <li><a%s>%s</a></li>',
                $attrString,
                htmlspecialchars($item->label, ENT_QUOTES, 'UTF-8')
            ));
        }

        write_line('</ul>');
    }
}