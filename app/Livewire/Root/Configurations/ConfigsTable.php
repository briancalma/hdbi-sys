<?php

namespace App\Livewire\Root\Configurations;

use App\Models\Configuration;
use Livewire\Component;
use Livewire\WithPagination;

class ConfigsTable extends Component
{
    use WithPagination;

    public function render()
    {
        $configs = Configuration::simplePaginate(5);

        return view('livewire.root.configurations.configs-table', [
            'configs' => $configs   
        ]);
    }

    public function triggerEditConfigModal($configId)
    {
        $this->dispatch('edit-config', $configId);
    }
}
