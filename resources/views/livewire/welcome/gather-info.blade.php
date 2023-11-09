<?php

use App\Models\Info;
use Livewire\Volt\Component;

new class extends Component {
    public $full_name,
        $nric,
        $age,
        $experience,
        $rank,
        $family_count,
        $elders_and_kids_count,
        $accomodation_situation,
        $physically_form_submitted_date,
        $moved_to_state_date,
        $both_couple_are_staffs_in_same_city = 'No',
        $special_situation;

    private $rules = [
        'full_name' => 'required|string',
        'nric' => 'required|string|unique:infos',
        'age' => 'required|integer',
        'experience' => 'required|integer',
        'rank' => 'required|string',
        'family_count' => 'required|integer',
        'elders_and_kids_count' => 'required|integer',
        'accomodation_situation' => 'required|string',
        'physically_form_submitted_date' => 'required|date',
        'moved_to_state_date' => 'required|date',
        'both_couple_are_staffs_in_same_city' => 'required|string',
        'special_situation' => 'nullable|string',
    ];

    public function registerApplication()
    {
        $validatedData = $this->validate($this->rules);
        (new Info($validatedData))->save();
        return redirect('/');
    }
}; ?>

<section>
    <form class="container shadow-lg bg-white/70 my-2 backdrop-blur-lg p-8 rounded-lg" wire:submit="registerApplication">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('messages.FORM.title') }}</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">{{ __('messages.FORM.desc') }}</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="full_name"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('messages.FORM.fields.0') }}</label>
                        <div class="mt-2">
                            <input type="text" wire:model="full_name" id="full_name" autocomplete="full_name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('full_name')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="nric"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('messages.FORM.fields.1') }}</label>
                        <div class="mt-2">
                            <input type="text" wire:model="nric" id="nric" autocomplete="nric"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('nric')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="age"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('messages.FORM.fields.2') }}</label>
                        <div class="mt-2">
                            <input type="number" wire:model="age" id="age" autocomplete="age" min="18"
                                max="60"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('age')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="experience"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('messages.FORM.fields.3') }}</label>
                        <div class="mt-2">
                            <input type="number" wire:model="experience" id="experience" autocomplete="experience"
                                min="1" max="45"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('experience')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="rank"
                            class="block text-sm font-medium leading-6 text-gray-900">{{ __('messages.FORM.fields.4') }}</label>
                        <div class="mt-2">
                            <select id="rank" wire:model="rank" autocomplete="rank"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="" hidden>{{ __('messages.FORM.DEFAULT_SELECT') }}</option>
                                @foreach (__('messages.RANKS') as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('rank')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="family_count" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.5') }}
                        </label>
                        <div class="mt-2">
                            <input type="number" wire:model="family_count" id="family_count"
                                autocomplete="family_count" min="1" max="200" placeholder="2"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            @error('family_count')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="elders_and_kids_count" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.6') }}
                        </label>
                        <div class="mt-2">
                            <input type="number" wire:model="elders_and_kids_count" id="elders_and_kids_count"
                                autocomplete="elders_and_kids_count" min="1" max="200" placeholder="0"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('elders_and_kids_count')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="accomodation_situation" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.7') }}
                        </label>
                        <div class="mt-2">
                            <select id="accomodation_situation" wire:model="accomodation_situation"
                                autocomplete="accomodation_situation"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="" hidden>{{ __('messages.FORM.DEFAULT_SELECT') }}</option>
                                @foreach (__('messages.ACCOMODATION_SITUATIONS') as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('accomodation-situation')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="physically_form_submitted_date"
                            class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.8') }}
                        </label>
                        <div class="mt-2">
                            <input type="date" wire:model="physically_form_submitted_date"
                                id="physically_form_submitted_date" autocomplete="physically_form_submitted_date"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('physically_form_submitted_date')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="moved_to_state_date" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.9') }}
                        </label>
                        <div class="mt-2">
                            <input type="date" wire:model="moved_to_state_date" id="moved_to_state_date"
                                autocomplete="moved_to_state_date"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('moved_to_state_date')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="both_couple_are_staffs_in_same_city"
                            class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.10') }}
                        </label>
                        <div class="mt-3 relative flex gap-x-3">
                            <div class="flex items-center gap-x-3">
                                <input id="no" wire:model="both_couple_are_staffs_in_same_city" type="radio"
                                    name="radio" checked value="No"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="no"
                                    class="block text-sm font-medium leading-6 text-gray-900">No</label>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <input id="yes" wire:model="both_couple_are_staffs_in_same_city "
                                    type="radio" name="radio" value="Yes"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="yes"
                                    class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                            </div>
                        </div>
                        @error('both_couple_are_staffs_in_same_city')
                            <p class="text-red-500 text-sm italic">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="special_situation" class="block text-sm font-medium leading-6 text-gray-900">
                            {{ __('messages.FORM.fields.11') }}
                        </label>
                        <div class="mt-2">
                            <textarea id="special_situation" wire:model="special_situation" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            @error('sppecial_situation')
                                <p class="text-red-500 text-sm italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</section>
