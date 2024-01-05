<div>

    <div class="card w-full bg-base-100 shadow-xl mt-10 mb-10">
        <div class="card-body">



            <form wire:submit.prevent="update">


                   @if(!$is_plus_one)
                    <h1 class="text-center text-2xl border-b border-blue-100 ">{{ $name }}</h1>
                   @else
                    <label class="block text-gray-500 font-bold mt-2" for="name">
                       Full Name
                    </label>
                    <input type="text"
                           class="font-light bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           wire:model="name" value="{{ $name }}"
                           placeholder="Enter name of additional guest"
                    >
                    @endif


                <br>

                <label class="block text-gray-500 font-bold mt-2" for="grid-state">
                    Confirm Attendance
                </label>
                <div class="relative">
                    <select wire:model="guest_status_id"
                            class="font-light block appearance-none w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="grid-state">

                        @foreach($allGuestStatusTypes as $status)
                            <option value="{{ $status->id }}"
                                    @if($status->id == $guest_status_id)
                                        selected
                                    @endif
                                    @if($status->id == 1)
                                        disabled
                                   @endif
                            >{{ $status->name }}</option>
                        @endforeach

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <br>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-4 items-stretch" >

                    <label class="block text-gray-500 font-bold mt-2 w-full" for="email">
                        Contact Email (Optional)
                        <input type="email" wire:model="email" value="{{ $email }}"
                               class="font-light bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 placeholder:text-xs"
                               placeholder="If you would like to be contacted by email"
                        >
                    </label>


                    <label class="block text-gray-500 font-bold mt-2 w-full" for="phone">
                        Contact Phone (Optional)
                        <input type="text" wire:model="phone" value="{{ $phone }}"
                               class="font-light bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 placeholder:text-xs"
                               placeholder="If you would like to be contacted by phone/sms"
                        >
                    </label>
                </div>


                <label class="block text-gray-500 font-bold mt-5 mb-3" for="phone">
                    Special Requests or <span class="whitespace-nowrap">Additional Information</span><br>
                    <small>Do you have any dietary needs, allergies or any other questions?</small>
                    <textarea type="text" wire:model="custom_reply" value="{{ $custom_reply }}"
                              class="font-light  bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    ></textarea>
                </label>


                <div class="card-actions justify-end justify-center">
                    <div wire:dirty>
                        <button class="btn w-80 btn-primary text-center" type="submit">Submit RSVP</button>
                    </div>
                    <div wire:dirty.remove>
                            @if($guest_status_id == 1)
                                <button class="btn w-80 btn-primary text-center cursor-not-allowed" type="submit" disabled>
                                    Submit RSVP
                                </button>
                            @else
                            <button class="btn w-80 btn-accent text-center text-white" type="submit">
                                RSVP Sent
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </button>

                            @endif
                    </div>
                </div>

                <br><hr><br>

                <div class="card-actions justify-end justify-center">
                    <div wire:dirty>
                        <p class="text-rose-400 text-center mb-1">
                            Please click Submit to send your response&hellip;
                        </p>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
