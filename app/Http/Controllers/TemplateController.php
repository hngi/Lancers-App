<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');          
    }

    public function index()
    {
        $templates = Template::latest()->get();
        return $this->SUCCESS($templates);
    }


    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|string',
            'name' => 'required|string',
            'body' => 'required|string',
            'type' => 'required|string'
        ]);

        $template = Template::create($request->all());
        return $this->SUCCESS($template);
    }

    public function show($id)
    {
        $template = Template::find($id);

        if($template){
            return $this->SUCCESS($template);
        }
        return $this->ERROR('Template not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'nullable|string',
            'name' => 'nullable|string',
            'body' => 'nullable|string',
            'type' => 'nullable|string'
        ]);

        $template = Template::find($id);

        if($template){
            $template->update($request->all());
            return $this->SUCCESS($template);
        }
        return $this->ERROR('Template not found');
    }

    public function destroy($id)
    {
        $template = Template::find($id);

        if($template){
            Template::destroy($id);
            return $this->SUCCESS('Template deleted');
        }
        return $this->ERROR('Template not found');
    }

}
