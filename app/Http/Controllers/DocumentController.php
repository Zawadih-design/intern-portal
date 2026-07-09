<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{


    /**
     * Display documents
     */
    public function index()
    {

        $documents = Document::with('user')
            ->latest()
            ->get();


        return view(
            'documents.index',
            compact('documents')
        );

    }



    /**
     * Upload form
     */
    public function create()
    {

        return view('documents.create');

    }



    /**
     * Store document
     */
    public function store(Request $request)
    {


        $validated = $request->validate([


            'title' => [
                'required',
                'string'
            ],


            'type' => [
                'required',
                'in:CV,Letter,Report,Certificate,Other'
            ],


            'file' => [
                'required',
                'file',
                'max:5120'
            ]


        ]);



        $path = $request->file('file')
            ->store(
                'documents',
                'public'
            );



        Document::create([

            'user_id' => Auth::id(),

            'title' => $validated['title'],

            'type' => $validated['type'],

            'file_path' => $path,

            'status' => 'Pending'

        ]);



        return redirect()

            ->route('documents.index')

            ->with(
                'success',
                'Document uploaded successfully'
            );

    }




    /**
     * Download document
     */
    public function download(Document $document)
    {
        $filePath = storage_path('app/public/' . $document->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'Document not found');
        }

        $fileName = $document->title . '.' . pathinfo($document->file_path, PATHINFO_EXTENSION);

        return response()->download($filePath, $fileName);

    }


}