<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class ApiDiaryController extends Controller
{
  public function index()
  {
    $diary = Diary::all();

    return response()->json($diary);
  }
}
