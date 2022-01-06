<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup(Request $request)
    {
        $request->validate([
            'account_id' => ['required', 'exists:companies,id'],
        ]);
    }
}
