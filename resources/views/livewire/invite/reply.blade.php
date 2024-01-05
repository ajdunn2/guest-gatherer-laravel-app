<div>
    <div>
        <div class="hero-content text-center">
            <div class="max-w-md">

                <h1 class="text-5xl font-bold drop-shadow-md cursive-font">{{ $this->record->title }}</h1>
                <p class="py-6 text- nice-font">{{ $this->record->custom_message }}</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
        poop
    </div>

    <x-form wire:submit="save">
        {{-- Full error bag --}}
        {{-- All attributes are optional, remove it and give a try--}}
        <x-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />

        <x-input label="Custom Messaqe" wire:model="invite" />

        {{-- Notice `omit-error`--}}
        <x-input label="E-mail" wire:model="email" hint="It will omit error here" omit-error />





        <x-slot:actions>
            <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>


    <x-filament-actions::modals />
</div>
