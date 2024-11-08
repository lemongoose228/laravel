<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller {

    public function __construct() {

    }

    public function index() {
        return view('form');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'direction' => 'required',
            'accept' => 'accepted'
        ]);

        $dataDir = storage_path('data');
        if (!file_exists($dataDir)) {
            mkdir($dataDir, 0777, true);
        }

        $names = $request->except([
            '_token'
        ]);

        $filename = $dataDir . '\\' . uniqid() . '.txt';

        $contents = [
            'ФИО' => $names['name'],
            'Почта' => $names['email'],
            'Телефон' => $names['phone'],
            'Направление' => $names['direction'],
            'Согласие на обработку персональных данных' => $names['accept'],
        ];

        $json = json_encode($contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        file_put_contents($filename, $json);

        return back()->with('status', 'Данные сохранены');
    } 

    public function DataTable() {
        $filesData = [];
        $dataDirectory = storage_path('data');
    
        $textFiles = scandir($dataDirectory);
        foreach ($textFiles as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
                $filePath = $dataDirectory . DIRECTORY_SEPARATOR . $file;
                $jsonContent = file_get_contents($filePath);
                $parsedData = json_decode($jsonContent, true);
                if ($parsedData !== null) { 
                    $filesData[] = $parsedData;
                }
            }
        }
    
        return view("DataTable", ["filesData" => $filesData]);
    }
}