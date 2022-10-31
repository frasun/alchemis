<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Logo extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert types.
     *
     * @var array
     */
    public $types = [
        'default' => '#223728',
        'light' => '#fff'
    ];

    /**
     * The alert styles.
     *
     * @var string
     */
    public $style;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @return void
     */
    public function __construct($type = 'default', $style = null)
    {
        $this->type = $this->types[$type] ?? $this->types['default'];
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.logo');
    }
}
