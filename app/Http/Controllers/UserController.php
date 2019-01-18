<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProfile() {
        $suitcases = Auth::user()->suitcases;
        $suitcaseDetails = [];
        foreach ($suitcases as $suitcases) {
          foreach ($suitcases->details()->get() as $sc) {
            $suitcaseDetails[] = $sc;
          }
        }
        return view('user.profile',  ['orderDetails' => $orderDetails]);
      }
}
