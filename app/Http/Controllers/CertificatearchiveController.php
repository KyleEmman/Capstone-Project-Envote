<?php

namespace App\Http\Controllers;

use App\Models\Certificatearchive;
use Illuminate\Http\Request;

class CertificatearchiveController extends Controller
{
    public function store($certificates){
        if($certificates){
            foreach($certificates as $certificate){
                Certificatearchive::create([
                    'id' => $certificate->id,
                    'studentID' => $certificate->studentID,
                    'electionarchive_id' => $certificate->election_id,
                    'firstName' => $certificate->firstName,
                    'middleName' => $certificate->middleName,
                    'lastName' => $certificate->lastName,
                    'schoolYear' => $certificate->schoolYear,
                    'url' => $certificate->url,
                    'created_at' => $certificate->created_at,
                    'updated_at' => $certificate->updated_at
                ]);
            }
        }   
        return true;
    }
}
