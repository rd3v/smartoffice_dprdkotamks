<?php

namespace App\Functions\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow {

    public function model(array $row) {
        
        return new Post([
           'id'     => $row['id'],
           'title'    => $row['title'], 
           'description' => $row['description'],
        ]);
    }

}