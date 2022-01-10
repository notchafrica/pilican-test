<div class="py-4 px-6">
    <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mb-5 mb-xl-10"
        id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
        <!--begin::Card header-->
        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 border-0 cursor-pointer"
            role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview">
            <div class="mb-3">
                <h3 class="fw-bolder m-0">Overview</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div class=" opacity-100 block">
            <!--begin::Card body-->
            <div class="flex-auto p-6 border-t p-9">
                <div class="flex items-start flex-wrap">
                    <div class="flex flex-wrap">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-125px mb-7 mr-3 relative">
                            <img src="{{url('/img/company.png')}}" width="72px" alt="image">
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Profile-->
                        <div class="flex flex-col">
                            <div class="fs-2 fw-bolder mb-1">{{auth()->user()->name}}</div>
                            <div class="text-gray-400 text-hover-primary fs-6 fw-bold">@lang("Username"):
                                {{auth()->user()->username}}</div>
                            <div class="text-gray-400 text-hover-primary fs-6 fw-bold">@lang("Email"):
                                {{auth()->user()->email}}</div>
                            <div class="text-gray-400 text-hover-primary fs-6 fw-bold mb-5">@lang("Phone"):
                                {{auth()->user()->phone}}</div>
                        </div>
                        <!--end::Profile-->
                    </div>
                </div>
                {{--
                <!--begin::Notice-->
                <div class="notice flex bg-light-warning rounded border-yellow-500 border border-dashed rounded p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black">
                            </rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black">
                            </rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="flex flex-stack flex-grow">
                        <!--begin::Content-->
                        <div class="fw-bold">
                            <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                            <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                                <a href="/good/account/billing.html">Add Payment Method</a>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice--> --}}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->

        <div
            class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 border-0 cursor-pointer"
                role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="mb-3 m-0">
                    <h3 class="fw-bolder m-0">@lang("Sign-in Method")</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_signin_method" class="*opacity-100 block">
                <!--begin::Card body-->
                <div class="flex-auto p-6 border-t p-9">
                    <!--begin::Email Address-->
                    <div class="flex flex-wrap items-center">
                        <!--begin::Label-->
                        <div id="kt_signin_email">
                            <div class="fs-6 fw-bolder mb-1">@lang("Username")</div>
                            <div class="fw-bold text-gray-600">{{auth()->user()->username}}</div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <div class="flex flex-wrap items-center">
                        <!--begin::Label-->
                        <div id="kt_signin_email">
                            <div class="fs-6 fw-bolder mb-1">@lang("Company ID")</div>
                            <div class="fw-bold text-gray-600">{{auth()->user()->company->code}}</div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Email Address-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-6"></div>
                    <!--end::Separator-->
                    <!--begin::Password-->
                    <div class="flex flex-wrap items-center space-x-6 mb-10">
                        <!--begin::Label-->
                        <div id="kt_signin_password">
                            <div class="fs-6 fw-bolder mb-1">Password</div>
                            <div class="fw-bold text-gray-600">************</div>
                            <button
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-100 text-gray-800 hover:bg-gray-200 btn-active-light-primary">Reset
                                Password</button>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Password-->
                    <!--begin::Notice-->
                    {{-- <div class="notice flex bg-light-primary rounded border-indigo-600 border border-dashed p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="black"></path>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="flex flex-stack flex-grow flex-wrap md:flex-no-wrap">
                            <!--begin::Content-->
                            <div class="mb-3 md:mb-0 fw-bold">
                                <h4 class="text-gray-900 fw-bolder">Secure Your Account</h4>
                                <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of
                                    security to your account. To log in, in addition you'll need to provide a 6 digit
                                    code
                                </div>
                            </div>
                            <!--end::Content-->
                            <!--begin::Action-->
                            <a href="#"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-indigo-600 text-white hover:bg-indigo-600 px-6 self-center whitespace-nowrap"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div> --}}
                    <!--end::Notice-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Content-->
        </div>
    </div>
</div>