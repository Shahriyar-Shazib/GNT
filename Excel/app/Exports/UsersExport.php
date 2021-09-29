<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

// use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements 
    // FromCollection,
    Responsable,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    FromQuery

{
    Use Exportable;
    private $filename='users.xlsx';
    // here in this collection function we use from collection and later replace it  in the next finction which is query
    // it helps when we will work with a large AMOUNT OF DATA 
    // public function collection()
    // {
    //     return User::all();
    // }
    public function query()
    {
        return User::query();
    }
    public function headings() :array
    {
        return ["ID", "Name"];
    }
    public function map($User): array
    {
        return [
            $User->id,
            $User->name,
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class=>function(AfterSheet $event){
                $event->sheet->getStyle('A1:B1')->applyFromArray([
                    'font'=>[
                        'bold'=>true
                    ],
                    'borders' => [
                        'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ]
                ]);
            }
        ];

    }
}
