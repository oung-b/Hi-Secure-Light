<?php

namespace App\Exports;

use App\Models\System;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SoftwareExport implements FromView, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
        return view('exports.software', [
            'systems' => System::with('category')->with('softwares')->get()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->getSheet()->getDelegate();
                // 기본적으로 $event->getSheet()->getDelegate()는 해당 시트를 접근하기 위한 메소드로 보면 된다. 난 $sheet라는 변수로 할당해서 사용한다.

                $sheet->getStyle('A:M')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                // $sheet->getStyle('A2:I2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                // $sheet->getStyle('A3:I3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('A:M')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                $sheet->getStyle('A1:M1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => '025b94'],]);
                $sheet->getStyle('A1:M1')->getFont()->getColor()->setARGB("ffffff");

                $sheet->getRowDimension(1)->setRowHeight(40);

                /*foreach (range('A', 'W') as $columnId) {  //A부터 W열까지 AutoSize를 사용하지 않고 내가 직접 입력한 열 크기로 맞춘다. (한글은 autoSize가 안됨.)
                    $sheet->getColumnDimension($columnId)->setAutoSize(false);
                    $sheet->getColumnDimension($columnId)->setWidth(15);
                }*/
            }
        ];
    }
}
