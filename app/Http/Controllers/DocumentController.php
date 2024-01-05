<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
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

    public function documentDownload($id){
        $documentDownload = Document::find($id);

        $download_file =$documentDownload->document_file;
        $headers = array(
            'Content-Type : application/pdf',
            'Content-Type : application/docx',
        ); 
        $download_file_url = url('storage/public/documents/'.$download_file);
        return response()->download($download_file_url);
    }
}