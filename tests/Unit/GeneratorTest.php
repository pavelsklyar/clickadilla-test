<?php

namespace Tests\Unit;

use App\Helpers\GeneratorHelper;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    private $stringRegExp = "/([A-Za-z])/";
    private $alphanumericRegExp = "/([A-Za-z0-9])/";
    private $numericRegExp = "/([0-9])/";
    private $guidRegExp = "/[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}/";

    public function testGenerateString()
    {
        $type = "string";
        $length = 15;

        $result = GeneratorHelper::generate($type, $length);
        $this->assertTrue(strlen($result) === $length, "Длина строки не равна заданной!");
        $this->assertTrue(preg_match($this->stringRegExp, $result) === 1, "Строка не соответствует регулярному выражению!");
    }

    public function testGenerateAlphanumeric()
    {
        $type = "alphanumeric";
        $length = 15;

        $result = GeneratorHelper::generate($type, $length);
        $this->assertTrue(strlen($result) === $length, "Длина строки не равна заданной!");
        $this->assertTrue(preg_match($this->alphanumericRegExp, $result) === 1, "Строка не соответствует регулярному выражению!");
    }

    public function testGenerateNumeric()
    {
        $type = "numeric";
        $length = 15;

        $result = GeneratorHelper::generate($type, $length);
        $this->assertTrue(strlen($result) === $length, "Длина строки не равна заданной!");
        $this->assertTrue(preg_match($this->numericRegExp, $result) === 1, "Строка не соответствует регулярному выражению!");
    }

    public function testGenerateGuid()
    {
        $type = "guid";
        $length = 15;

        $result = GeneratorHelper::generate($type, $length);
        $this->assertTrue(preg_match($this->guidRegExp, $result) === 1, "Строка не соответствует регулярному выражению!");
    }
}
