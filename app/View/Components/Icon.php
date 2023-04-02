<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Icon extends Component
{
    public $icon;
    public $width;
    public $height;
    public $viewBox;
    public $fill;
    public $strokeWidth;
    public $id;
    public $class;

    public function __construct(
        $icon = null,
        $viewBox = '20 20',
        $fill = 'currentColor', // currentColor, none
        $strokeWidth = 0,
        $id = null,
        $class = null
    ) {
        $this->icon = $icon;
        $this->width = Config::get('constants.icons.size');
        $this->height = Config::get('constants.icons.size');
        $this->viewBox = $viewBox;
        $this->fill = $fill;
        $this->strokeWidth = $strokeWidth;
        $this->id = $id ?? '';
        $this->class = $class ?? '';
    }

    public function render()
    {
        return view('components.icon');
    }
}
