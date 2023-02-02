<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\TemplateinfoController;

class TemplateController extends Controller
{
    public function index(){
        $templates = Template::all();
        return view('admin.templates', [
            'heading' => 'Position Templates',
            'templates' => $templates,
        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required'
        ]);
        $createTemplate = Template::create($formFields);
        (new TemplateinfoController)->store($request->positionName, $createTemplate->id);
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Created a template');
        return back()->with('successMessage', 'Template added successfully!');
    }

    public function update(Template $template, Request $request){
        $formFields = $request->validate([
            'title' => 'required'
        ]);
        $template->update($formFields);
        (new TemplateinfoController)->destroy($template->id);
        (new TemplateinfoController)->store($request->positionName, $template->id);
        (new AdminlogController)->store(auth()->guard('admin')
        ->user()->firstName,auth()->guard('admin')->user()->lastName,'Updated a template');
        return back()->with('successMessage', 'Template updated successfully!');
    }

    public function duplicate(Template $template){
        $reference = Template::find($template);
        $positions = $reference->templateinfos()->pluck('positionName')->toArray();
        $createTemplate = $reference->replicate();
        $createTemplate->title .= " copy ";
        $createTemplate->save();
        (new TemplateinfoController)->store($positions, $createTemplate->id);
        return back()->with('successMessage', 'Template coppied successfully!');
    }

    public function destroy(Template $template){
        $template->delete();
        return back()->with('successMessage', 'Template deleted successfully!');
    }
}
