<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeIconpark\BladeIconparkServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('iconpark-asterisk')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><circle cx="24" cy="24" r="20" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 24H33" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 16.2058L28.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.5 16.2058L19.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('iconpark-asterisk', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><circle cx="24" cy="24" r="20" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 24H33" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 16.2058L28.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.5 16.2058L19.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('iconpark-asterisk', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><circle cx="24" cy="24" r="20" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 24H33" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 16.2058L28.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.5 16.2058L19.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-iconpark.class', 'awesome');

        $result = svg('iconpark-asterisk')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><circle cx="24" cy="24" r="20" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 24H33" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 16.2058L28.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.5 16.2058L19.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-iconpark.class', 'awesome');

        $result = svg('iconpark-asterisk', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><circle cx="24" cy="24" r="20" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 24H33" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 16.2058L28.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.5 16.2058L19.5 31.7942" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
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
