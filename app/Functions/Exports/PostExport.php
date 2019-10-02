<?php

namespace App\Functions\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings {

    public function collection() {
        return Post::all();
    }

    public function headings(): array {
        return [
            'id',
            'Title',
            'Description'
        ];
    }

}
