<?php

namespace App\Http\Controllers;

class PdfController extends Controller
{
    //
    public function showRelazione(){

        return response()->file(public_path('relazione.pdf'),['content-type'=>'application/pdf']);
    }
}
