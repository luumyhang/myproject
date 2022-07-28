<?php


namespace App\Http\Services\Export;


use App\Models\Export;

class ExportService
{
    public function getAll()
    {
        return Export::all();
    }

    public function find($id)
    {
        return Export::find($id);
    }
}
