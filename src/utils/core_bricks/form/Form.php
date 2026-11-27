<?php

require_once __DIR__.'/../utils.php';

use function Utils\write_line;

enum Method : string
{
    case GET = "get";
    case POST = "post";
    case PUT  = "put";
    case DELETE  = "delete";
}

class Form
{
    public string $action;
    public Method $method;
    public string $className;
    public array $formElements;

    public function __construct(string $action, Method $method, string $className = "")
    {
        $this->action = $action;
        $this->method = $method;
        $this->className = $className;
        $this->formElements = [];
    }

    public function addElement(FormElement $element): void
    {
        $this->formElements[] = $element;
    }

    public function render(): void
    {
        write_line(sprintf(
            '<form action="%s" method="%s" class="%s">',
            htmlspecialchars($this->action),
            $this->method->value,
            htmlspecialchars($this->className)
        ));

        foreach ($this->formElements as $element) {

            if ($element->type === ElementType::HTML) {
                write_line('  ' . $element->value);
                continue;
            }

            if (!empty($element->label)) {
                write_line(sprintf(
                    '  <label for="%s">%s</label>',
                    $element->id,
                    htmlspecialchars($element->label)
                ));
            }

            $attributes = [
                'id' => $element->id,
                'type' => $element->type->value,
                'name' => $element->name,
                'value' => $element->value,
            ];
            $attributes = array_merge($attributes, $element->attributes);

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

            write_line('  <input ' . implode(' ', $renderedAttributes) . '>');
        }

        write_line('</form>');
    }
}