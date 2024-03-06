<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Mpdf\Mpdf;

class DataController extends Controller
{
    public function index()
    {
        $jsonData = [
            ["name" => "Dabjam", "email" => "tnevin0@house.gov", "status" => false],
            ["name" => "Tambee", "email" => "myeeles1@woothemes.com", "status" => false],
            ["name" => "Dynabox", "email" => "amcgibbon2@europa.eu", "status" => true],
            ["name" => "Avamm", "email" => "qmedendorp3@cornell.edu", "status" => false],
        ];
        return view('data-table', compact('jsonData'));
    }

    public function exportToPdf(Request $request)
    {
        $jsonData = json_decode($request->get('data'), true);

        $mpdf = new Mpdf();
        $mpdf->WriteHtml(view('data-table-pdf', compact('jsonData'))->render());
        $mpdf->Output('data-table.pdf', 'D'); // Download the PDF

        return response()->json([
            'message' => 'Data exported successfully!',
        ]);
    }
}
