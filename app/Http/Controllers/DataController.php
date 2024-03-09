<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use PDF;
class DataController extends Controller
{

    public function index()
    {
        return view('dataTable');
    }
    
    public function getData()
    {
        $users = json_decode(file_get_contents(public_path('users.json')), true);
        return DataTables::of($users)
                    ->make(true);

    }
    
    public function downloadPdf()
    {
        // Load users data from JSON file
        $users = json_decode(file_get_contents(public_path('users.json')), true);
        if (empty($users)) {
            // Handle no users scenario (e.g., display message)
            return;
          }
        // Create a new mPDF instance
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => 10,
            'margin_footer' => 10,
            'margin_top' => 30,
            'margin_bottom' => 20,
            'margin_left' => 10,
            'margin_right' => 10,
        ]);
    
        // dd($users); // Place this right before the view is rendered to inspect the data

        // Load the view and pass the users data to it
        $html = view('dataTablePdf', compact('users'))->render();
    
    // dd($html); 
        // Write the HTML to the PDF
        $mpdf->WriteHTML($html);
    
        // Output the PDF to the browser
        $mpdf->Output('users.pdf', 'D');
    }
    
    
}
