<?php
namespace App\Enums;

use Illuminate\Support\Arr;

enum ProductStatusEnum: string
{
    case DRAFT = 'Borrador';
    case SHOP = 'Tienda';
    case POS = 'Punto de venta';
    case BOTH = 'Ambos';
    case DISABLED = 'Desactivado';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
// case NAME = 'VALUE';
// El value es lo que se almaneca en la base de datos