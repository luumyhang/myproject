<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Export\ExportService;

class ExportController extends Controller
{

    protected $exportService;

    public function __construct(ExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    public function index(Request $request)
    {
        $exports = $this->exportService->getAll();
        return view('admin.exports.list', [
            'title' => 'Danh Sách Xuất Kho',
            'exports' => $exports
        ]);
    }

    public function create($id)
    {
    
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $export = $this->exportService->find($id);
        return view('admin.exports.show', [
            'title' => 'Chi tiết phiếu xuất',
            'export' => $export
        ]);
    }

    public function update(Request $request)
    {

    }

    public function destroy()
    {

    }

    public function bill($id)
    {
        $export = $this->exportService->find($id);
        return view('admin.exports.bill', compact('export'));
    }
}
