<?php

enum ElementType: string
{
    case TEXT = "text";
    case EMAIL = "email";
    case PASSWORD = "password";
    case CHECKBOX = "checkbox";
    case BUTTON = "button";
    case SUBMIT = "submit";
    case TEXTAREA = "textarea";
    case SELECT = "select";
    case HTML = 'html';
}

class FormElement
{
    public string $id;
    public string $name;
    public ElementType $type;
    public string $label;
    public string $value;
    public array $attributes;
    public array $options;

    public function __construct(
        string $name,
        ElementType $type,
        string $label = "",
        string $value = "",
        array $attributes = [],
        array $options = []
    ) {
        $this->id = "field-" . $name;
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->options = $options;
    }
}
