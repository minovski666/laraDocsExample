<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use File;
use \App\Documentation;

class DocumentationTest extends TestCase
{
    /**
     * @test
     */
    public function gets_doc_page_for_given_version()
    {
        File::shouldReceive('exists')->andReturn(true);
        File::shouldReceive('get')->once()->with(resource_path('docs/1.0/example.md'))->andReturn('# Example Page For {{version}}');

        $content = (new Documentation)->get('1.0', 'example');

        $this->assertEquals('<h1>Example Page For 1.0</h1>', $content);
    }

    /**
     * @test
     */
    public function throws_exception_if_markdown_file_doesnt_exists()
    {
        $this->expectException(\Exception::class);
        (new Documentation)->get('1.0', 'example');
    }

}
