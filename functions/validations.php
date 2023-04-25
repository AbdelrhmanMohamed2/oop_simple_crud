<?php

class Validations
{
    public $input;

    public function __construct($data)
    {
        $this->input = $data;
    }

    public function required()
    {
        return empty($this->input);
    }

    public function maxInputSize($size)
    {
        return strlen($this->input) > $size;
    }

    public function minInputSize($size)
    {
        return strlen($this->input) < $size;
    }

    public function sanitize()
    {
        $this->input = trim(htmlentities(htmlspecialchars($this->input)));
    }

    public function numeric()
    {
        return is_numeric($this->input);
    }
}


// ############ sanitize ######################
function sanitize($input)
{
    return trim(htmlentities(htmlspecialchars($input)));
}
// ############################################


// ############ max input #####################
function maxInputSize($input, $size)
{
    return strlen($input) > $size;
}
// ############################################


// ############ min input #####################
function minInputSize($input, $size)
{
    return strlen($input) < $size;
}
// ############################################