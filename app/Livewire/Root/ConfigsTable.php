<?php

namespace App\Livewire\Root;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ConfigsTable extends Component
{
    use WithPagination;

    public function render()
    {
        $configs = Configuration::simplePaginate(5);

        return view('livewire.root.configs-table', [
            'configs' => $configs
        ]);
    }
}
