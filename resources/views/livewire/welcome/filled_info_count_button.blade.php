<?php

use Livewire\Volt\Component;
use App\Models\Info;

new class extends Component {
    public string $filled_info_count = '';

    public function mount(): void
    {
        $this->filled_info_count = Info::count() ?? 0;
    }
}; ?>

<a href="#second_step" class="page-scroll flex items-center justify-center single-counter counter-color-2">
    <div class="text-center counter-items">
        <span class="text-2xl font-bold text-white"><span class="counter">{{ $filled_info_count }}</span></span>
        <p class="text-white">Filled Info</p>
    </div>
</a> <!-- single counter -->
