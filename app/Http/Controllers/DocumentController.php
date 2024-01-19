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

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    // public function documentUpload(Request $request){
    //     try {

    //         dd($request->all());
    //         $file = $request->file('document_file');

    //         $allowedFileTypes = ['pdf', 'doc', 'docx', 'txt'];
    //         $extension = $file->getClientOriginalExtension();

    //         if (!in_array($extension, $allowedFileTypes)) {
    //             return response()->json(['status' => false, 'message' => 'Invalid file. Please select a file with format pdf, doc, docx, or txt.']);
    //         }

    //         // Ensure the destination directory exists
    //         $destinationPath = public_path('documents');
    //         if (!is_dir($destinationPath)) {
    //             mkdir($destinationPath, 0755, true);
    //         }
    //         // dd( $destinationPath);

    //         // Move and store the file in the 'documents' directory
    //         $originalFileName = $file->getClientOriginalName();
    //         $file->move($destinationPath, $originalFileName);

    //         $document = new Attachment();

    //         // Store information in the database columns
    //         $document->joborder_id = $request->joborder_id;
    //         $document->company_id = $request->company_id;
    //         $document->owner_id = Auth::user()->id;

    //         $document->title = $originalFileName;  // Original file name
    //         $document->original_filename = $originalFileName;
    //         $document->content_type = $file->getClientMimeType();  // MIME type of the file
    //         // $document->file_size_kb = $file->getSize() / 1024;
            

    //         // Add other columns as needed

    //         $document->save();

    //         if ($document) {
    //             return response()->json(['status' => true, 'message' => 'Document uploaded successfully.']);
    //         } else {
    //             return response()->json(['status' => false, 'message' => 'Document not uploaded.']);
    //         }

    //     } catch (\Exception $e) {
    //         dd($e);
    //         return response()->json(['status' => false, 'message' => 'Something went wrong.']);
    //     }
    // }

    public function documentUpload(Request $request)
{
    try {

        // dd($request->all());
        $file = $request->file('document_file');

        $allowedFileTypes = ['pdf', 'doc', 'docx', 'txt'];
        $extension = $file->getClientOriginalExtension();

        if (!in_array($extension, $allowedFileTypes)) {
            return response()->json(['status' => false, 'message' => 'Invalid file. Please select a file with format pdf, doc, docx, or txt.']);
        }

        // Ensure the destination directory exists
        $destinationPath = public_path('documents');
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Move and store the file in the 'documents' directory
        $originalFileName = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFileName);

        // Create a new Attachment model
        $document = new Attachment([
            'title' => $originalFileName,
            'original_filename' => $originalFileName,
            'content_type' => $file->getClientMimeType(),
            'owner_id' => Auth::user()->id,
        ]);

       if($request->input('company_id')){
           $attachableType = Company::class;
           $attachableId = $request->input('company_id');
       }elseif($request->input('joborder_id')){
            $attachableType = JobOrder::class;
            $attachableId = $request->input('joborder_id');
       }elseif($request->input('contact_id')){
            $attachableType = Contact::class;
            $attachableId = $request->input('contact_id');
       }elseif($request->input('candidate_id')){
            $attachableType = Candidate::class;
            $attachableId = $request->input('candidate_id');
       }else{
            $attachableType = null;
            $attachableId = null;
       }
              
        $document->attachable_id = $attachableId;
        $document->attachable_type = $attachableType;
        $document->save();

        if ($document) {
            return response()->json(['status' => true, 'message' => 'Document uploaded successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Document not uploaded.']);
        }
    } catch (\Exception $e) {
        return response()->json(['status' => false, 'message' => 'Something went wrong.']);
    }
}

// private function getAttachableType(Request $request)
// {
//     // dd($request->input('document_type'));
//     switch ($request->input('document_type')) {
//         case 'company_id':
//             return Company::class;
//         case 'joborder_id':
//             return Joborder::class;
//         case 'contact_id':
//             return Contact::class;
//         // Add more cases as needed
//         default:
//             return Company::class; // Default to Company if document_type is not specified or unknown
//     }
// }

// private function getAttachableId(Request $request, $attachableType)
// {
//     $idField = strtolower(class_basename($attachableType)) . '_id';
//     return $request->input($idField);
// }

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