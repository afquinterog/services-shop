<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithUI
{
    public function notification(String $title, String $message)
    {
        $this->dispatchBrowserEvent('sa-new-message-to-display', [
            'title' => $title,
            'message' => $message
        ]);
    }
}
