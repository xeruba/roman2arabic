<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConversionsPostConvertRequest;

class ConversionsController extends Controller
{
    public function convert(ConversionsPostConvertRequest $request){
        return response()->json([
            'arabic' => \Converter::roman2arabic($request->roman),
        ], 200);
    }
}
