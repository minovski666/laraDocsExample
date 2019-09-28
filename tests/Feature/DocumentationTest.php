<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentationTest extends TestCase
{
    /**
     * @test
     */
    public function latest_documentation_version()
    {
        $this->get('docs/some-page')->assertRedirect('docs/' . DEFAULT_VERSION . '/some-page');
    }

    /**
     * @test
     */
    public function loads_and_parses_markdown()
    {
        $this->get('docs/'.DEFAULT_VERSION.'/stub')
            ->assertSee('<h1>Stub</h1>')
            ->assertSee('<p>Here is Docs stub.</p>');
    }
}
