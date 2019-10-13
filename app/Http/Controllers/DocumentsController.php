<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');          
    }

    public function index()
    {
        $documents = Document::latest()->get();
        return $this->SUCCESS($documents);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $document = Document::create($request->all());
        return $this->SUCCESS($document);
    }

    public function show($id)
    {
        $document = Document::find($id);

        if($document){
            return $this->SUCCESS($document);
        }
        return $this->ERROR('Document not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'body' => 'nullable|string'
        ]);

        $document = Document::find($id);

        if($document){
            $document->update($request->all());
            return $this->SUCCESS($document);
        }
        return $this->ERROR('Document not found');
    }

    public function destroy($id)
    {
        $document = Document::find($id);

        if($document){
            Document::destroy($id);
            return $this->SUCCESS('Document deleted');
        }
        return $this->ERROR('Document not found');
    }
}
