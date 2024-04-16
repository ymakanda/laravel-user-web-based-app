<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'View' }}  {{ $user->name }} details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ ' Full Name' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->name }} {{ $user->surname }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'South African Id Number' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->id_numder }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Mobile Number' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->mobile_number }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Email Address' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->email }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Birth Date' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->birth_date}}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Language' }}: 
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->language }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Interests' }}
                        </h2>

                        <?php   
                            $interests= json_decode($user->interests, true);
                            $count = 1;
                         ?>

                        @foreach($interests as $intrest)
                        <p class="mt-1 text-sm text-gray-600">

                        {{ $count ++ }}. {{ $intrest}}
                        </p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Created At' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->created_at->diffForHumans() }}
                            </span>
                        </h2>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Updated At' }}:
                            <span class="mt-1 text-sm text-gray-600">
                                {{ $user->updated_at->diffForHumans() }}
                            </span>
                        </h2>
                    </div>
                    <a href="{{ route('all-users') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>