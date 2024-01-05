<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\GuestStatus;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Invite;
use App\Models\Guest;

class GuestForm extends Component
{
    public ?Guest $guest;

    public $allGuestStatusTypes;

    public $name = '';
    public $email = '';

    public $phone = '';
    public $is_plus_one;

    public $guest_status_id;


    public $custom_reply;

    public function mount($guest)
    {
        $this->allGuestStatusTypes = GuestStatus::all();

        $this->guest = $guest;

        $this->name = $guest->name ?? '';

        $this->email = $guest->email ?? '';
        $this->phone = $guest->phone ?? '';

        $this->is_plus_one = $guest->is_plus_one;

        $this->custom_reply = $guest->custom_reply;

        $this->guest_status_id = $guest->guest_status_id;
    }

    public function rules()
    {
        return [
        ];
    }

    public function update()
    {
//        $this->validate();
        $this->guest->update($this->all());
//        $this->reset();
    }

    public function render()
    {
        return view('livewire.guest-form', [
            'allGuestStatusTypes' => $this->allGuestStatusTypes,
        ]);
    }
}
