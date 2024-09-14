<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        return response()->json([
            'message' => "Statut mis à jour : Julien est $status",
        ]);
    }
}
