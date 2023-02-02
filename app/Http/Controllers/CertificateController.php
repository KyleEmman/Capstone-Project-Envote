<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function store($info){
        $cert = Certificate::create($info);
        return $cert->id;
    }

    public function show($studentID, Election $election){
        $cert = Certificate::where('studentID', $studentID)->where('election_id', $election->id)->first();
        return view('components.e-certificate', [
            'cert' => $cert
        ]);
    }

    public function retrieve($certificates){
        if($certificates){
            foreach($certificates as $certificate){
                Certificate::create([
                    'id' => $certificate->id,
                    'studentID' => $certificate->studentID,
                    'election_id' => $certificate->electionarchive_id,
                    'firstName' => $certificate->firstName,
                    'middleName' => $certificate->middleName,
                    'lastName' => $certificate->lastName,
                    'schoolYear' => $certificate->schoolYear,
                    'url' => $certificate->url,
                    'created_at' => $certificate->created_at,
                    'updated_at' => $certificate->updated_at,
                ]);
            }
        }
        return true;
    }
}
