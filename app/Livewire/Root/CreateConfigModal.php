<?php

namespace App\Livewire\Root;

use App\Models\Configuration;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateConfigModal extends Component
{
    public string $key;   
    public string $type;
    public string $value;

    public function createConfig()
    {
        $this->validate([
            'key' => 'required|string|max:255|unique:configurations,key',
            'type' => 'required|string|in:string,integer,boolean',
            'value' => ['required' ,'string' , 'max:255', new \App\Rules\ValueTypeMatchesTypeRule($this->type)],
        ]);

        Configuration::create([
            'key' => $this->key,
            'type' => $this->type,
            'value' => $this->value
        ]);

        request()->session()->flash('success', 'Configuration added successfully.');

        // $this->dispatch('config-created');

        $this->redirect(route('root.configurations.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.root.create-config-modal');
    }
}
