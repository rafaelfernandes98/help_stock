<?php
namespace Mini\Libs;

class Formatacoes{

    public static function mask($value, $mask)
    {
        $masked = "";
        $k = 0;

        for ($i = 0; $i < strlen($mask); $i++) {
            if ($mask[$i] == "#") {
                if (isset($value[$k])) {
                    $masked .= $value[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $masked .= $mask[$i];
                }
            }
        }

        return $masked;
    }

    public static function maskMoney($value, $precision = 2)
    {
        return number_format($value, $precision, ',', '.');
    }

    public static function formatMoneyBanco($value)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }
}




?>