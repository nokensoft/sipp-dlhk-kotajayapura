
@extends('AdminMaster.layouts.app')
@section('content')
<div class="flex items-center justify-between mb-4">
    <h3>Settings</h3>
</div>
<div class="card adaptable-card">
    <div class="card-body">
        <div class="tabs">
            <div role="tablist" class="tab-list tab-list-underline">
                <button class="tab-nav tab-nav-underline active" data-bs-toggle="tab" data-bs-target="#tab-profile" role="tab" aria-selected="true" tabindex="0">
                    Profile
                </button>
                <button class="tab-nav tab-nav-underline" data-bs-toggle="tab" data-bs-target="#tab-password" role="tab" aria-selected="false" tabindex="0">
                    Password
                </button>
            </div>
            <div class="tab-content px-4 py-6">
                <div class="tab-pane fade show active" id="tab-profile" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form action="#">
                        <div class="form-container vertical">
                            <div>
                                <h5>General</h5>
                                <p>Basic info, like your name and address that will displayed in public</p>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">Name</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <span class="input-wrapper">
                                                <div class="input-suffix-start">
                                                    <svg
                                                        stroke="currentColor"
                                                        fill="none"
                                                        stroke-width="2"
                                                        viewBox="0 0 24 24"
                                                        aria-hidden="true"
                                                        class="text-xl"
                                                        height="1em"
                                                        width="1em"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                                <input
                                                    class="input pl-8"
                                                    type="text"
                                                    name="name"
                                                    autocomplete="off"
                                                    placeholder="Name"
                                                    value="Ron Vargas"
                                                >
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">Email</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <span class="input-wrapper">
                                                <div class="input-suffix-start">
                                                    <svg
                                                        stroke="currentColor"
                                                        fill="none"
                                                        stroke-width="2"
                                                        viewBox="0 0 24 24"
                                                        aria-hidden="true"
                                                        class="text-xl"
                                                        height="1em"
                                                        width="1em"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <input
                                                    class="input pl-8"
                                                    type="email"
                                                    name="email"
                                                    autocomplete="off"
                                                    placeholder="Email"
                                                    value="ronnie_vergas@infotech.io"
                                                >
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">Avatar</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <div class="upload cursor-pointer">
                                                <input
                                                    class="upload-input"
                                                    type="file"
                                                    title=""
                                                    value=""
                                                >
                                                <span class="avatar avatar-circle avatat-lg border-2 border-white shadow-lg" data-avatar-size="60">
                                                    <img class="avatar-img avatar-circle" src="{{asset('assets/img/avatars/thumb-3.jpg')}}" loading="lazy">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 items-center">
                                <div class="font-semibold">Title</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <span class="input-wrapper">
                                                <div class="input-suffix-start">
                                                    <svg
                                                        stroke="currentColor"
                                                        fill="none"
                                                        stroke-width="2"
                                                        viewBox="0 0 24 24"
                                                        aria-hidden="true"
                                                        class="text-xl"
                                                        height="1em"
                                                        width="1em"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <input
                                                    class="input pl-8"
                                                    type="text"
                                                    name="title"
                                                    autocomplete="off"
                                                    placeholder="Title"
                                                    value="UI/UX Designer"
                                                >
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <h5>Preferences</h5>
                                <p>Your personalized preference displayed in your account</p>
                            </div>

                            <div class="grid md:grid-cols-3 gap-4 py-8 items-center">
                                <div class="font-semibold">Sync Data</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="switcher">
                                            <input type="checkbox">
                                            <span class="switcher-toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-4 ltr:justify-end gap-2">
                                <button class="btn btn-default" type="button">
                                    Reset
                                </button>
                                <button class="btn btn-solid" type="submit">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <form action="#">
                        <div class="form-container vertical">
                            <div>
                                <h5>Password</h5>
                                <p>Enter your current &amp; new password to reset your password</p>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">Current Password</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <input
                                                class="input"
                                                type="password"
                                                name="password"
                                                autocomplete="off"
                                                placeholder="Current Password"
                                                value=""
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">New Password</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <input
                                                class="input"
                                                type="password"
                                                name="newPassword"
                                                autocomplete="off"
                                                placeholder="New Password"
                                                value=""
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 py-8 border-b border-gray-200 items-center">
                                <div class="font-semibold">Confirm Password</div>
                                <div class="col-span-2">
                                    <div class="form-item vertical mb-0 max-w-[700px]">
                                        <label class="form-label"></label>
                                        <div>
                                            <input
                                                class="input"
                                                type="password"
                                                name="confirmNewPassword"
                                                autocomplete="off"
                                                placeholder="Confirm Password"
                                                value=""
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex ltr:justify-end gap-2">
                                <button class="btn btn-default" type="button">Reset</button>
                                <button class="btn btn-solid" type="submit">Update Password</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-6">
                        <div>
                            <h5>Where you're signed in</h5>
                            <p>You're signed in to your account on these devices.</p>
                        </div>
                        <div class="rounded-lg border border-gray-200 mt-6">
                            <div class="flex items-center px-4 py-6 border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="text-3xl">
                                        <svg
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                            height="1em"
                                            width="1em"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3 rtl:mr-3">
                                        <div class="flex items-center">
                                            <div class="text-gray-900 font-semibold">Desktop FKL-278</div>
                                            <div class="tag bg-emerald-100 text-emerald-600 rounded-md border-0 mx-2">
                                                <span class="capitalize"> Current</span>
                                            </div>
                                        </div>
                                        <span>Manhattan, United State • 09-Mar-2022, 05:32 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center px-4 py-6 border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="text-3xl">
                                        <svg
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                            height="1em"
                                            width="1em"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3 rtl:mr-3">
                                        <div class="flex items-center">
                                            <div class="text-gray-900 font-semibold">iPhone 13 Pro Max</div>
                                        </div>
                                        <span>Manhattan, United State • 04-Mar-2022, 08:15 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center px-4 py-6">
                                <div class="flex items-center">
                                    <div class="text-3xl">
                                        <svg
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                            height="1em"
                                            width="1em"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3 rtl:mr-3">
                                        <div class="flex items-center">
                                            <div class="text-gray-900 font-semibold">iPad Air</div>
                                        </div>
                                        <span>New York, United State • 01-Mar-2022, 05:15 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

