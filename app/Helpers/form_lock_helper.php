<?php

/**
 * readonly untuk input text, number, date, dll
 */
function form_readonly(bool $bolehEdit): string
{
    return $bolehEdit ? '' : 'readonly';
}

/**
 * disabled untuk select, checkbox, radio
 */
function form_disabled(bool $bolehEdit): string
{
    return $bolehEdit ? '' : 'disabled';
}

/**
 * hidden input pengganti select disabled
 */
function form_hidden_if_disabled(string $name, $value, bool $bolehEdit): string
{
    if ($bolehEdit) return '';

    return '<input type="hidden" name="' . esc($name) . '" value="' . esc($value) . '">';
}


function js_bool(bool $val): string
{
    return $val ? 'true' : 'false';
}

function btn_disabled(bool $bolehEdit): string
{
    return $bolehEdit ? '' : 'disabled';
}
