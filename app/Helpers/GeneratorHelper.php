<?php


namespace App\Helpers;


use Faker\Provider\Uuid;

class GeneratorHelper
{
    public static function generate($type, $length)
    {
        switch ($type) {
            case "string":
                return self::generateString($length);
            case "alphanumeric":
                return self::generateString($length, true);
            case "integer":
                return self::generateInteger($length);
            case "guid":
                return self::generateGuid();
            default:
                return ['status' => "false", "error" => "Недопустимое значение атрибута type!"];
        }
    }

    private static function generateString($length, $all = false)
    {
        if ($all) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        else {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        $charactersLength = strlen($characters);
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, $charactersLength - 1)];
        }

        return $string;
    }

    private static function generateInteger($length)
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;

        return rand($min, $max);
    }

    private static function generateGuid()
    {
        return Uuid::uuid();
    }
}
