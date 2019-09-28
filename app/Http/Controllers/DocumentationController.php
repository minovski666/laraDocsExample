<?php

namespace App\Http\Controllers;

use Facades\App\Documentation;

class DocumentationController extends Controller
{
    public function show($version, $page='')
    {
        if (!in_array($version, [1.0, 1.1])){
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version);
        }

        return view('docs', [
            'content' => Documentation::get($version, $page)
        ]);
    }
}
