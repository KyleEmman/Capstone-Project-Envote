<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Templateinfo;
use Illuminate\Http\Request;

class TemplateinfoController extends Controller
{
    public function store($positions, $templateID){
        foreach ($positions as $position){
            Templateinfo::create(['template_id' => $templateID, 'positionName' => $position]);
        }
    }
    public function destroy($templateID){
        $templateInfos = Templateinfo::where('template_id', $templateID);
        $templateInfos->delete();
    }

}
