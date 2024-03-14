<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Joborder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory as PhpWordIOFactory;
use App\Services\ParseWord;
use App\Services\WordParser;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function index($search = null)
{
    $extractedData = []; // Array to store all extracted data
    $files = Attachment::get();

    foreach ($files as $file) {
        $resumeContent = $file->resume_content;
        if (stripos($resumeContent, $search) !== false ||
            stripos($file->name, $search) !== false ||
            stripos($file->email, $search) !== false ||
            stripos($file->phone, $search) !== false) {
            $emails = [];
            preg_match_all('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{0,3})/', $resumeContent, $emails);
            foreach ($emails[0] as $email) {
                if (preg_match('/^\w+[\w.-]*@\w+[\w.-]+\.[a-z]{1,}$/i', $email)) {
                    preg_match('/\b[A-Za-z]+(?:\s+[A-Za-z]+)?/', $email, $matches);
                    $nameFromEmail = ucwords(strtolower($matches[0] ?? ''));
                    // dd( $resumeContent);
                    $namePosition = stripos($resumeContent, $nameFromEmail);
                    if ($namePosition !== false) {
                        $surroundingText = substr($resumeContent, $namePosition - 10, 20);

                        $phones = [];
                        preg_match_all('/(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\b/', $resumeContent, $phones);
                        $phone = implode('', $phones[0]); 

                        // dd($email);
                        $extractedData[] = [
                            'id' =>  $file->id,
                            'name' => $nameFromEmail,
                            'email' => $email,
                            'phone' => $phone,
                            'surrounding_text' => $surroundingText
                        ];
                    }
                }
            }
        }
    }
    // dd($extractedData);
    return view('resume-parser.resume_parsers', ['extractedData' => $extractedData]);
}

    
    public function parseText($contents)
    {
        // Split the text content by lines
        $lines = explode("\n", $contents);

        // Initialize an array to store parsed data
        $parsedData = [];

        // Loop through each line and add it to the parsed data
        foreach ($lines as $line) {
            $parsedData[] = trim($line); // Trim whitespace from the line and add it to the parsed data
        }

        return $parsedData;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


    public function documentUpload(Request $request)
    {
        try {
            $files = $request->file('document_file');
            // dd($files);
            // If single file uploaded, convert it to an array for consistency
            if (!is_array($files)) {
                $files = [$files];
            }
    
            $allowedFileTypes = ['pdf', 'doc', 'docx', 'txt'];
            $uploadedDocuments = [];
    
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
    
                if (!in_array($extension, $allowedFileTypes)) {
                    return response()->json(['status' => false, 'message' => 'Invalid file. Please select a file with format pdf, doc, docx, or txt.']);
                }

                $destinationPath = public_path('documents');
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
    
                // Move and store the file in the 'documents' directory
                $originalFileName = $file->getClientOriginalName();
                
                $file->move($destinationPath, $originalFileName);
                $textContent = $this->extractTextFromDocument($destinationPath . '\\' . $originalFileName);
                $textFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '.txt';
                file_put_contents($destinationPath . '\\' . $textFileName, $textContent);
                
                // dd($textContent);
           
                // Create a new Attachment model
                $document = new Attachment([
                    'title' => $originalFileName,
                    'original_filename' => $originalFileName,
                    'content_type' => $file->getClientMimeType(),
                    'owner_id' => Auth::user()->id,
                    'resume_content' => $textContent,
                    'text' => $destinationPath . '/' . $textFileName, // Store the path to the text file
                ]);
                
    
                if ($request->input('company_id')) {
                    $attachableType = Company::class;
                    $attachableId = $request->input('company_id');
                } elseif ($request->input('joborder_id')) {
                    $attachableType = JobOrder::class;
                    $attachableId = $request->input('joborder_id');
                } elseif ($request->input('contact_id')) {
                    $attachableType = Contact::class;
                    $attachableId = $request->input('contact_id');
                } elseif ($request->input('candidate_id')) {
                    $attachableType = Candidate::class;
                    $attachableId = $request->input('candidate_id');
                } else {
                    $attachableType = null;
                    $attachableId = null;
                }
    
                $document->attachable_id = $attachableId;
                $document->attachable_type = $attachableType;
                $document->save();
    
                $uploadedDocuments[] = $document;
            }
    
            if (!empty($uploadedDocuments)) {
                return response()->json(['status' => true, 'message' => 'Documents uploaded and text content stored successfully.', 'documents' => $uploadedDocuments]);
            } else {
                return response()->json(['status' => false, 'message' => 'No documents uploaded.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong.']);
        }
    }
    
    
    private function extractTextFromDocument($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $textContent = '';
    
        if ($extension === 'pdf') {
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);
            $textContent = $pdf->getText();
        } elseif (in_array($extension, ['doc', 'docx'])) {
            $phpWord = PhpWordIOFactory::load($filePath);
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    // Handle different types of elements
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        foreach ($element->getElements() as $text) {
                            $textContent .= $text->getText();
                        }
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $textContent .= $element->getText();
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                        foreach ($element->getRows() as $row) {
                            foreach ($row->getCells() as $cell) {
                                $textContent .= $cell->getText();
                            }
                        }
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\TextBreak) {
                        // Do nothing for text breaks
                    } else {
                        // Handle other types of elements if needed
                    }
                }
            }
        } elseif ($extension === 'txt') {
            $textContent = file_get_contents($filePath);
        }
    
        return $textContent;
    }
    


    public function documentDelete($id){
        $documentDelete = Attachment::find($id)->delete();

        if($documentDelete){
            return response()->json(['status' => true, 'message' => 'Document deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'No file uploaded.']);
        }
    }

    

    public function documentDownload($id)
    {
        $documentDownload = Attachment::find($id);
        if (!$documentDownload) {
            abort(404); // Document not found
        }

        $download_file = $documentDownload->title;
        $file_path = public_path('documents/' . $download_file);

        if (!file_exists($file_path)) {
            abort(404, 'File not found');
        }

        $headers = [
            'Content-Type' => mime_content_type($file_path),
        ];

        return response()->download($file_path, $documentDownload->original_filename, $headers);
    }

   
    public function convertDocxToPdf(Request $request)
{
    try {
        $docxPath = $request->input('docxUrl');
// dd($docxPath = public_path('documents/CV_Tarun.docx'));
        // Check if the file exists
        if (!$docxPath = 'http://127.0.0.1:8000/documents/CV_Tarun.docx') {
            return response()->json(['status' => 'error', 'message' => 'Cannot find the DOCX file'], 404);
        }

        // Read DOCX file contents
        $docxContents = Storage::disk('public')->get($docxPath);

        // Load the DOCX contents into PhpWord
        $phpWord = new PhpWord();
        $phpWord->loadHTML($docxContents);

        // Rest of your conversion logic...

        // Example: Saving HTML and converting to PDF
        $tempHtmlFile = tempnam(sys_get_temp_dir(), 'docx_');
        $phpWord->saveHTML($tempHtmlFile);
        $pdfBuffer = $this->convertHtmlToPdf($tempHtmlFile);

        // Return PDF response
        return response($pdfBuffer)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="converted.pdf"');
    } catch (\Exception $e) {
        dd($e);
        \Log::error('Error converting DOCX to PDF: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Failed to convert DOCX to PDF'], 500);
    }
}
    
    private function convertHtmlToPdf($htmlFile)
    {
        $html = file_get_contents($htmlFile);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        return $dompdf->output();
    }
}