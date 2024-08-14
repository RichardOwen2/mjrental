<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class OrderExport implements FromView, WithEvents
{
    private $date;
    private $datas;

    public function __construct($date, $datas)
    {
        $this->date = $date;
        $this->datas = $datas;
    }

    public function view(): View
    {
        $date = $this->date;
        $datas = $this->datas;

        return view('exports.order', compact([
            'date',
            'datas'
        ]));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A4:Z4')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);

                $event->sheet->getColumnDimension('A')->setWidth(5);
                $event->sheet->getColumnDimension('B')->setWidth(20);
                $event->sheet->getColumnDimension('C')->setWidth(20);
                $event->sheet->getColumnDimension('D')->setWidth(20);
                $event->sheet->getColumnDimension('E')->setWidth(20);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(20);
                $event->sheet->getColumnDimension('H')->setWidth(20);
                $event->sheet->getColumnDimension('I')->setWidth(20);
                $event->sheet->getColumnDimension('J')->setWidth(20);
            }
        ];
    }
}
