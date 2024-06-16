<?php

namespace App\Livewire\Root;

use App\Models\Configuration;
use Livewire\Component;

class DeleteConfigModal extends Component
{
    public function render()
    {
        return view('livewire.root.delete-config-modal');
    }

    public function deleteConfig($id)
    {
        $config = Configuration::find($id);

        if(!$config) 
            return;

        $config->delete();
        
        request()->session()->flash('warning', 'Configuration deleted successfully.');

        $this->redirect(
            url: route('root.configurations.index'), 
            navigate: true
        );
    }

}
