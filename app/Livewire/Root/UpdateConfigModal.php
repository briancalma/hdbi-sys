<?php

namespace App\Livewire\Root;

use App\Models\Configuration;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateConfigModal extends Component
{

    public string $key;   
    public string $type;
    public string $value;   

    public Configuration $config;

    public function updateConfig()
    {
        $this->validate([
            'key' => 'required|string|max:255|unique:configurations,key,' .  $this->config->id,
            'type' => 'required|string|in:string,integer,boolean',
            'value' => ['required' ,'string' , 'max:255', new \App\Rules\ValueTypeMatchesTypeRule($this->type)],
        ]);

        $this->config->update([
            'key' => $this->key,
            'type' => $this->type,
            'value' => $this->value,
        ]);

        request()->session()->flash('success', 'Configuration updated successfully.');

        // $this->dispatch('config-created');

        $this->redirect(route('root.configurations.index'), navigate: true);
    }


    public function render()
    {
        return view('livewire.root.update-config-modal');
    }
    
    #[On('config-edit')] 
    public function setConfig($configId)
    {
        $this->config = Configuration::findOrFail($configId);

        $this->key = $this->config->key;
        $this->type = $this->config->type;
        $this->value = $this->config->value;
    }
}
