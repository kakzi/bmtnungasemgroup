<?php

namespace App\Livewire;

use Livewire\Component;

class PdfViewerModal extends Component
{

    public $fileUrl;
    public function render()
    {
        return view('livewire.pdf-viewer-modal');
    }

    public function open($fileUrl)
    {
        $this->fileUrl = $fileUrl;
        $this->dispatchBrowserEvent('open-pdf-modal');
    }
}
