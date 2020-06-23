<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class FormDescription extends Component
{
    /**
     * @var null
     */
    public $formClass;
    /**
     * @var null
     */
    public $content;

    /**
     * Create a new component instance.
     *
     * @param null $formClass
     * @param null $content
     */
    public function __construct(
        $formClass = null,
        $content = null
    )
    {

        $this->formClass = $formClass;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.form-description');
    }
}
