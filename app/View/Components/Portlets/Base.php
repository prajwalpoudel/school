<?php

namespace App\View\Components\Portlets;

use Illuminate\View\Component;

class Base extends Component
{
    public $portletClass;
    /**
     * @var null
     */
    public $headTitle;
    /**
     * @var null
     */
    public $headClass;
    /**
     * @var null
     */
    public $headCaptionClass;
    /**
     * @var null
     */
    public $headTitleClass;
    /**
     * @var null
     */
    public $headIcon;
    /**
     * @var null
     */
    public $headIconClass;
    /**
     * @var null
     */
    public $headTitleTextClass;
    /**
     * @var null
     */
    public $bodyClass;
    /**
     * @var null
     */
    public $content;
    /**
     * @var bool
     */
    public $footer;
    /**
     * @var null
     */
    public $footerClass;
    /**
     * @var null
     */
    public $form;
    /**
     * @var null
     */
    public $formClass;
    /**
     * @var null
     */
    public $formMethod;
    /**
     * @var null
     */
    public $formAction;
    /**
     * @var null
     */
    public $model;
    /**
     * @var null
     */

    /**
     * Create a new component instance.
     *
     * @param $portletClass
     * @param null $headTitle
     * @param null $headClass
     * @param null $headCaptionClass
     * @param null $headTitleClass
     * @param null $headIcon
     * @param null $headIconClass
     * @param null $headTitleTextClass
     * @param null $bodyClass
     * @param null $content
     * @param bool $footer
     * @param null $footerClass
     * @param bool $form
     * @param null $formClass
     * @param null $formMethod
     * @param null $formAction
     * @param null $model
     */
    public function __construct(
        $portletClass = null,
        $headTitle = null,
        $headClass = null,
        $headCaptionClass = null,
        $headTitleClass = null,
        $headIcon = null,
        $headIconClass = null,
        $headTitleTextClass = null,
        $bodyClass = null,
        $content = null,
        $footer = true,
        $footerClass = null,
        $form = false,
        $formClass = null,
        $formMethod = null,
        $formAction = null,
        $model = null
    )
    {
        $this->portletClass = $portletClass;
        $this->headTitle = $headTitle;
        $this->headClass = $headClass;
        $this->headCaptionClass = $headCaptionClass;
        $this->headTitleClass = $headTitleClass;
        $this->headIcon = $headIcon;
        $this->headIconClass = $headIconClass;
        $this->headTitleTextClass = $headTitleTextClass;
        $this->bodyClass = $bodyClass;
        $this->content = $content;
        $this->footer = $footer;
        $this->footerClass = $footerClass;
        $this->form = $form;
        $this->formClass = $formClass;
        $this->formMethod = $formMethod;
        $this->formAction = $formAction;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.portlets.base');
    }
}
