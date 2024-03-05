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

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search = null)
    {
        if($search != null){
            $files = Attachment::get();
            $matchingResumes = [];
            foreach ($files as $file) {
                // Check if the resume content contains the skill "node.js"
                if (stripos($file->resume_content, $search) !== false) {
                    // If found, add the resume to the matching resumes array
                    $matchingResumes[] = $file->resume_content;
                }
            }
            dd( $matchingResumes);
            // foreach ($files as $file) {
            //     // Extract names using regular expressions
            //     $resumeContent = $file->resume_content;
            //     $names = [];
            //     preg_match_all('/\b[A-Z][a-z]*\s[A-Z][a-z]*\b/', $resumeContent, $names);
            //     // $names now contains potential names extracted from resume content
            //     dd($names);
            // }
            // foreach ($files as $file) {
            //     // Assuming the name is enclosed within curly braces {} in the resume_content
            //     preg_match('/\{([^}]*)\}/', $file->resume_content, $matches);
            //     $name = $matches[1] ?? "Name not found";
            //     dd($name);
            // }
        }
        return view('resume-parser.resume_parsers');
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



    // public function index()
    // {
    //     $files = Attachment::get();
    //     foreach ($files as $file) {
    //         $parsedData = [];
    //         $contents = File::get($file->text);
    //         if (pathinfo($file->text, PATHINFO_EXTENSION) === 'pdf') {
    //             $parsedData = $this->parsePdf($contents);
    //         } elseif (pathinfo($file->text, PATHINFO_EXTENSION) === 'docx') {
    //             $parsedData = $this->parseWord($contents);
    //         }elseif (pathinfo($file->text, PATHINFO_EXTENSION) === 'txt') {
    //             $parsedData = $this->parseText ($contents);
    //         } elseif (pathinfo($file->text, PATHINFO_EXTENSION) === 'doc') {
    //             $parsedData = $this->parseWord($contents);
    //         } else {
    //             echo "Unsupported file format: " . basename($contents) . "<br>";
    //             continue;
    //         }

    //         $candidate = [
    //             'name' => null,
    //             'skills' => [],
    //             'hobbies' => [],
    //             'qualifications' => []
    //         ];
    //         dd($parsedData);
    //         foreach ($parsedData as $data) {
    //             // Extracting name
    //             dd($data); die;
    //             if ($candidate['name'] === null && preg_match('/^([A-Z]+(?:\s+[A-Z]+)*)$|^([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*)$/', $data, $matches)) {
    //                 $candidate['name'] = $data;
    //                 continue;
    //             }

    //             // Extracting skills
    //             // Modify the regular expression pattern according to the format of skills in your documents
    //             // if (/* condition to match skills */) {
    //             //     $candidate['skills'][] = $data;
    //             //     continue;
    //             // }

    //             // // Extracting hobbies
    //             // // Modify the regular expression pattern according to the format of hobbies in your documents
    //             // if (/* condition to match hobbies */) {
    //             //     $candidate['hobbies'][] = $data;
    //             //     continue;
    //             // }

    //             // // Extracting qualifications
    //             // // Modify the regular expression pattern according to the format of qualifications in your documents
    //             // if (/* condition to match qualifications */) {
    //             //     $candidate['qualifications'][] = $data;
    //             //     continue;
    //             // }
    //         }

    //         // Output or store candidate data
    //         if ($candidate['name'] !== null) {
    //             echo "Candidate Name: " . $candidate['name'] . "<br>";
    //             echo "Skills: " . implode(', ', $candidate['skills']) . "<br>";
    //             echo "Hobbies: " . implode(', ', $candidate['hobbies']) . "<br>";
    //             echo "Qualifications: " . implode(', ', $candidate['qualifications']) . "<br>";
    //         } else {
    //             echo "Candidate data not found in file: " . basename($file->text) . "<br>";
    //         }
    //     }
    //     return view('resume-parser.resume_parsers');
    // }

    

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
    
                // // Ensure the destination directory exists
                // $destinationPath = public_path('documents');
                // if (!is_dir($destinationPath)) {
                //     mkdir($destinationPath, 0755, true);
                // }
                
                // // Move and store the file in the 'documents' directory
                // $originalFileName = $file->getClientOriginalName();
                // $file->move($destinationPath, $originalFileName);
                
                // // Extract text content from the document and save it as a text file
                // $textContent = $this->extractTextFromDocument($destinationPath . '/' . $originalFileName);
                // $textFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '.txt';
                // file_put_contents($destinationPath . '/' . $textFileName, $textContent);
                
                // // Create a new Attachment model
                // $document = new Attachment([
                //     'title' => $originalFileName,
                //     'original_filename' => $originalFileName,
                //     'content_type' => $file->getClientMimeType(),
                //     'owner_id' => Auth::user()->id,
                //     'text' => str_replace(public_path(), '', $destinationPath . '/' . $textFileName), // Store the relative path to the text file
                // ]);

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
                
                // dd(nl2br($textContent));
           
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
                    if (method_exists($element, 'getText')) {
                        $textContent .= $element->getText();
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
}