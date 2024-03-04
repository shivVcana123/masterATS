<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory as PhpWordIOFactory;
use Fpdf\Fpdf;

class ResumeParserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume-parser.resume_parsers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resumesParser(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx',
        ]);
        
        $resumeFile = $request->file('resume');
        $extension = $resumeFile->getClientOriginalExtension();
       
        if ($extension === 'pdf') {
            $parsedData = $this->parsePdf($resumeFile->path());
        } elseif (in_array($extension, ['doc', 'docx'])) {
            $parsedData = $this->parseWord($resumeFile->path());
        } else {
            return response()->json(['error' => 'Unsupported file format.'], 400);
        }
       
        // dd($parsedData);
        return response()->json($parsedData);
    }

    private function parsePdf($filePath)
    {
        $pdf = new Fpdf();
        $pdf->setSourceFile($filePath);
        $numPages = $pdf->getNumPages();
        $parsedData = [];

        for ($pageNumber = 1; $pageNumber <= $numPages; $pageNumber++) {
            $parsedData[] = $pdf->setPage($pageNumber)->extractText();
        }

        return $parsedData;
    }

    private function parseWord($filePath)
    {
        $phpWord = PhpWordIOFactory::load($filePath);
        $parsedData = [];

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $parsedData[] = $element->getText();
                }
            }
        }

        return $parsedData;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
