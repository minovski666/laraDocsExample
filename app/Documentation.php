<?php

namespace App;

use File;
use mysql_xdevapi\Exception;
use Parsedown;

class Documentation
{
    public function get($version, $page)
    {
        if (File::get($page = $this->markdownPath($version, $page))) {
            return (new Parsedown)->text(File::get($page));
        }

        throw new Exception('The requested docs page was not found');
    }

    public function markdownPath($version, $page)
    {
        return resource_path('docs/' . $version . '/' . $page . '.md');
    }

}