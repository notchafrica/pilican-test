<div class="w-full flex px-2 pt-4 h-screen overflow-hidden">
    <div class="flex-none w-72">
        <div class="shadow rounded p-2">
            <div class="flex flex-col justify-center space-y-2">
                <img alt="profil" src="{{ $customer->getUrlfriendlyAvatar() }}"
                    class="object-cover rounded-full h-20 w-20 mx-auto" />
                <div>
                    <h2 class="text-xl text-center font-semibold">{{$customer->name}}</h2>
                </div>
                <div>
                    <h3 class="text-center">@lang("Balance"): <span
                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-600 bg-green-50 rounded-md">
                            {{$customer->balance}}</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="min-h-screen flex-grow overflow-y-auto">
        <div class="w-full">Customers</div>
    </div>
</div>
