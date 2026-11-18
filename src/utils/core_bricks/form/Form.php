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
            if (!empty($element->label)) {
                write_line(sprintf(
                    '  <label for="%s">%s</label>',
                    $element->id,
                    htmlspecialchars($element->label)
                ));
            }

            write_line(sprintf(
                '  <input id="%s" type="%s" name="%s" value="%s">',
                $element->id,
                $element->type->value,
                htmlspecialchars($element->name),
                htmlspecialchars($element->value)
            ));
        }

        write_line('</form>');
    }
}