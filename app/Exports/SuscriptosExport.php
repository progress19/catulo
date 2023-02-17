<?php

namespace App\Exports;

use App\Suscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuscriptosExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings
{
    
    /**
    * @var Suscripcion $suscripcion
    */
   
   use Exportable;

   public function query() {
      return Suscripcion::query();
   }

    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function headings(): array  {
        return [
            'id',
            'Email',
        	];
    }

    public function map($suscripcion): array    {
        return [
            $suscripcion->id,
            $suscripcion->email,
        ];
    }
}
