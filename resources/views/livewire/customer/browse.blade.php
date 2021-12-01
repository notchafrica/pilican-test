<div>
    {{-- Do your work, then step back. --}}

    <div class="space-y-5 mt-5">
        <div class="border-b w-full flex justify-between items-end pb-2">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    User database
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-200">
                    Details and informations about user.
                </p>
            </div>
            <div class="pb-1">
                <x-button label="{{__('Create new customer')}}" wire:click="$emit('openModal', 'customer.create')"
                    primary />
            </div>
        </div>
        <ul class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5">
            <li class="border-gray-400 flex flex-row mb-2">
                <div
                    class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-4">
                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                        <a href="#" class="block relative">
                            <img alt="profil" src="/images/person/6.jpg"
                                class="mx-auto object-cover rounded-full h-10 w-10 " />
                        </a>
                    </div>
                    <div class="flex-1 pl-1 md:mr-16">
                        <div class="font-medium dark:text-white">
                            Jean Marc
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-sm">
                            Developer
                        </div>
                    </div>
                </div>
            </li>
            <li class="border-gray-400 flex flex-row mb-2">
                <div
                    class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-4">
                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                        <a href="#" class="block relative">
                            <img alt="profil" src="/images/person/10.jpg"
                                class="mx-auto object-cover rounded-full h-10 w-10 " />
                        </a>
                    </div>
                    <div class="flex-1 pl-1 md:mr-16">
                        <div class="font-medium dark:text-white">
                            Designer
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-sm">
                            Charlie Moi
                        </div>
                    </div>
                </div>
            </li>
            <li class="border-gray-400 flex flex-row mb-2">
                <div
                    class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-4">
                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                        <a href="#" class="block relative">
                            <img alt="profil" src="/images/person/3.jpg"
                                class="mx-auto object-cover rounded-full h-10 w-10 " />
                        </a>
                    </div>
                    <div class="flex-1 pl-1 md:mr-16">
                        <div class="font-medium dark:text-white">
                            CEO
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-sm">
                            Marine Jeanne
                        </div>
                    </div>
                </div>
            </li>
            <li class="border-gray-400 flex flex-row mb-2">
                <div
                    class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md flex flex-1 items-center p-4">
                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                        <a href="#" class="block relative">
                            <img alt="profil" src="/images/person/7.jpg"
                                class="mx-auto object-cover rounded-full h-10 w-10 " />
                        </a>
                    </div>
                    <div class="flex-1 pl-1 md:mr-16">
                        <div class="font-medium dark:text-white">
                            CTO
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-sm">
                            Boby PArk
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
