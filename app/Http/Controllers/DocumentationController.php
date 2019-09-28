<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function show($version, $page='')
    {
        if (!in_array($version, [1.0, 1.1])){
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version);
        }

        Documentation::get();
    }
}
