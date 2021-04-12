<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeIconpark\BladeIconparkServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('iconpark-a-cane-o')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M19.5571 44.7684C19.5571 44.7684 32.4675 20.4873 33.6412 18.28C34.8149 16.0726 37.453 8.98102 30.3894 5.22524C23.3258 1.46947 19.1566 7.18063 17.7482 9.82948" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath><rect fill="white"/></clipPath></defs></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('iconpark-a-cane-o', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M19.5571 44.7684C19.5571 44.7684 32.4675 20.4873 33.6412 18.28C34.8149 16.0726 37.453 8.98102 30.3894 5.22524C23.3258 1.46947 19.1566 7.18063 17.7482 9.82948" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath><rect fill="white"/></clipPath></defs></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('iconpark-a-cane-o', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M19.5571 44.7684C19.5571 44.7684 32.4675 20.4873 33.6412 18.28C34.8149 16.0726 37.453 8.98102 30.3894 5.22524C23.3258 1.46947 19.1566 7.18063 17.7482 9.82948" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath><rect fill="white"/></clipPath></defs></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeIconparkServiceProvider::class,
        ];
    }
}
