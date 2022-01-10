@section('title', 'Enter your license key')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            @if ($error == 'error')
            <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-red-500 rounded shadow" role="alert">
                <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>

                <p>@lang("We have trouble validating your license, either it is not valid or it is already used by
                    someone else. If the problem
                    persists, check your internet connection and then start the process again.")</p>
            </div>
            @endif

            @if (!$license->isActive())
            <div lass="flex items-center px-4 py-3 mb-6 text-sm text-white bg-red-500 rounded shadow" role="alert">
                <p>
                    @lang("It seems that the license that is attached to your account has a problem, either it has
                    expired or it has been
                    deactivated for your account.")
                </p>
            </div>
            @endif





            <form wire:submit.prevent='update' class="text-sm text-gray-700 space-y-2">
                <p>@lang("Update your license key.")</p>

                <div>
                    <x-inputs.maskable mask="XXXX XXXXX XXXXX XXXX" wire:model.defer="key"
                        :placeholder="__('License key')" />
                </div>
                <div>
                    <x-button type="submit" primary>@lang("Update")</x-button>
                </div>
            </form>
        </div>
    </div>
</div>