<?php

namespace App\Http\Controllers;

use App\Models\Document;
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


    public function documentUpload(Request $request){
        try {
            $upload_file = new Document();
            $upload_file->joborder_id = $request->joborder_id;
            $upload_file->company_id = $request->company_id;
            $upload_file->owner_id = Auth::user()->id;
    
            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
    
                // Validate file type (you can customize the allowed types)
                $allowedFileTypes = ['pdf', 'doc', 'docx', 'txt'];
                $extension = $file->getClientOriginalExtension();
    
                if (!in_array($extension, $allowedFileTypes)) {
                    return response()->json(['status' => false, 'message' => 'Invalid file plase select this format pdf, doc, docx, txt.']);
                }
    
                $originalFileName = $file->getClientOriginalName();
    
                // Store the file with a unique name
                $name = time() . '-' . $originalFileName;
                $file->storeAs('public/documents', $name);
    
                $upload_file->document_file = $name;
                $upload_file->document_file = $originalFileName;
                $upload_file->save();
    
                return response()->json(['status' => true, 'message' => 'Document uploaded successfully.']);
            } else {
                return response()->json(['status' => false, 'message' => 'No file uploaded.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong.']);
        }
    }

    public function documentDelete($id){
        $documentDelete = Document::find($id)->delete();

        if($documentDelete){
            return response()->json(['status' => true, 'message' => 'Document deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'No file uploaded.']);
        }
    }

    public function documentDownload($id)
    {
        $documentDownload = Document::find($id);
    
        if (!$documentDownload) {
            abort(404); // Document not found
        }
    
        $download_file = $documentDownload->document_file;
    
        // Ensure the file exists before attempting to download
        $file_path = storage_path('app/public/documents/' . $download_file);
        if (!file_exists($file_path)) {
            abort(404, 'File not found');
        }
    
        $headers = [
            'Content-Type' => mime_content_type($file_path),
        ];
    
        return response()->download($file_path, $documentDownload->original_filename, $headers);
    }
}