<?php

namespace Laraverse\Builders;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class VersePage
{
    private $path;
    private $name;
    private $pagetitle;
    private $contents;
    private $html;

    public function __construct(SplFileInfo $file, string $parent, bool $main = false)
    {
        $this->path = $parent;
        $this->setTitle($file);
        $relativePath = Str::replace('/', '.', $file->getRelativePath());
        if (!empty($relativePath) && !$main) {
            $this->path .= '.' . $relativePath;
        }

        if (!empty($this->name) && !$main) {
            $this->path .= '.' . $this->name;
        }
        $this->contents = File::get($file->getPathname());
        $this->html = app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)
            ->highlightTheme('github-dark')
            ->toHtml($this->contents);
    }

    public function setTitle(SplFileInfo $file): void
    {
        $filename = $file->getFilename();
        $extension = $file->getExtension();
        $this->name = Str::lower(Str::before($filename, '.' . $extension));
        $this->pagetitle = Str::replace('_', ' ', Str::ucfirst($this->name));
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getTitle()
    {
        return $this->pagetitle;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getContents()
    {
        return $this->contents;
    }
}
