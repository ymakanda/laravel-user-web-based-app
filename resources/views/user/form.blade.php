<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ isset($user) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($user) ? route('update-user', $user->id) : route('store-user') }}" class="mt-6 space-y-6" >
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($user)
                            @method('put')
                        @endisset
                
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$user->name ?? old('name')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Surname -->
                        <div>
                            <x-input-label for="surname" :value="__('Surname')" />
                            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$user->surname ?? old('surname')"/>
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>

                        <!-- South African Id Number -->
                        <div>
                            <x-input-label for="id_numder" :value="__('South African Id Number')" />
                            <x-text-input id="id_numder" class="block mt-1 w-full" type="text" name="id_numder" :value="$user->id_numder ?? old('id_numder')"/>
                            <x-input-error :messages="$errors->get('id_numder')" class="mt-2" />
                        </div>

                        <!-- Mobile Number -->
                        <div>
                            <x-input-label for="mobile_number" :value="__('Mobile Number')" />
                            <x-text-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="$user->mobile_number ?? old('mobile_number')"/>
                            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email Address')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email ?? old('email')" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Birth Date -->
                        <div>
                            <x-input-label for="birth_date" :value="__('Birth Date')" />
                            <x-text-input id="birth_date" class="block mt-1 w-full" type="text" placeholder="yyyy/mm/dd" name="birth_date" :value="$user->birth_date ?? old('birth_date')" />
                            
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>

                        <div>
                        <?php  
                            $options = ['Afrikaans','English','isiXhosa','isiZulu','Sesotho','Xitsonga',
                                        'isiNdebele','siSwati','Tshivenda','Setswana'];

                                        $selectedOption = $user->language; // User's selected option

                            ?>
                            <x-input-label for="language" value="Language" />
                            <select name="language" id="language" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($options as $option)
                                        <option value="{{ $option }}" {{ $option == $selectedOption ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div>
                            <?php  
                                $availableOptions = ['coding', 'reading', 'Athletics', 'dancing'];
                                $selectedOptions = json_decode($user->interests, true);
                            ?>
                        
                            <x-input-label for="interests" value="Interests" />
                            @foreach($availableOptions as $option)
                                <label class="ml-2" for="{{ $option }}">{{ $option }}</label>
                                <input type="checkbox" id="{{ $option }}" name="interests[{{ $option }}]" value="{{ $option }}" class="form-checkbox ml-5 mb-2 h-15 w-15 text-blue-600" {{ in_array($option, $selectedOptions) ? 'checked' : '' }}>
                            @endforeach
                            <x-input-error class="mt-2" :messages="$errors->get('interests')" />
                        </div>

                        <div class="flex items-center gap-4 mb-5 ml-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>