<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\SuitcaseDb;
use App\User;
class UserController extends Controller
{
    public function getProfile() {
        $suitcases = Auth::user()->suitcase;
        $suitcaseDetails = [];
        foreach ($suitcases as $suitcases) {
          foreach ($suitcases->details()->get() as $sc) {
            $suitcaseDetails[] = $sc;
          }
        }
        return view('user.profile',  ['suitcaseDetails' => $suitcaseDetails, 'suitcases' => $suitcases]);
      }
}
