<?php

namespace App\Livewire\Root;

use App\Models\Configuration;
use Livewire\Component;
use Livewire\WithPagination;

class ConfigsTable extends Component
{
    use WithPagination;

    public function deleteConfig($id)
    {
        $config = Configuration::find($id);

        if(!$config) 
            return;

        $config->delete();
        
        request()->session()->flash('warning', 'Configuration deleted successfully.');

        $this->resetPage();
    }

    public function render()
    {
        $configs = Configuration::simplePaginate(5);

        return view('livewire.root.configs-table', [
            'configs' => $configs
        ]);
    }
}
