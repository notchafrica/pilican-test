@section('title', 'Enter your license key')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-yellow-500 rounded shadow" role="alert"
                wire:poll.30s="checking">
                <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>

                <p>@lang("It is possible that the license attached to your account is not paid, please contact customer
                    service to make the
                    payment.")</p>


            </div>
            <div class="text-center">
                <a href="{{route('license.validate')}}" class="rounded py-2 px-3 bg-indigo-600 text-white">@lang("Back
                    to
                    license")</a>
            </div>
        </div>
    </div>
</div>
