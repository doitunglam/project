<?php

namespace App\View\Components\publisher;

use Illuminate\View\Component;

class campaignCell extends Component
{

    public $campaign;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($campaign)
    {
        //
        $this->campaign = $campaign;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.publisher.campaign-cell');
    }
}
