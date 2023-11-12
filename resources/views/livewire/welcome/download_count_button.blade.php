<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public string $download_count = '';

    public function mount(): void
    {
        $this->download_count =
            DB::table('download_counts')
                ->select('count')
                ->get()[0]->count ?? 0;
    }
}; ?>

<a href="#guide" class="page-scroll flex items-center justify-center single-counter counter-color-1">
    <div class="text-center counter-items">
        <span class="text-2xl font-bold text-white"><span class="counter"> {{ $download_count }} </span></span>
        <p class="text-white">Downloads</p>
    </div>
</a> <!-- single counter -->
