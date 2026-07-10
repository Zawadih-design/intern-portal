<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 shadow-sm">

    {{-- LEFT SECTION --}}
    <div class="flex items-center gap-4">

        {{-- Sidebar Toggle --}}
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="text-slate-600 hover:text-orange-500 text-2xl transition">

            ☰

        </button>


        {{-- Search --}}
        <div>

            <input
                type="text"
                placeholder="Search..."
                class="w-96 rounded-xl border border-slate-300 bg-slate-50 px-5 py-2.5 text-sm
                focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400">

        </div>

    </div>



    {{-- RIGHT SECTION --}}
    <div class="flex items-center gap-6">


        {{-- Notifications --}}
        <div 
            x-data="{notify:false}" 
            class="relative">


            <button
                @click="notify=!notify"
                class="relative text-xl text-slate-600 hover:text-orange-500 transition">

                🔔


                {{-- Notification Count --}}
                <span
                    class="
                    absolute
                    -top-2
                    -right-2
                    bg-orange-500
                    text-white
                    text-xs
                    rounded-full
                    w-5
                    h-5
                    flex
                    items-center
                    justify-center">

                    3

                </span>


            </button>



            {{-- Notification Dropdown --}}
            <div

                x-show="notify"

                @click.outside="notify=false"

                x-transition

                class="
                absolute
                right-0
                mt-4
                w-80
                bg-white
                rounded-2xl
                shadow-xl
                border
                border-slate-200
                p-4
                z-50">


                <h3 class="font-bold text-slate-800 mb-4">

                    Notifications

                </h3>


                <div class="border-b border-slate-100 pb-3 mb-3">


                    <p class="text-sm font-medium text-slate-800">

                        New intern registered

                    </p>


                    <span class="text-xs text-slate-500">

                        1 hour ago

                    </span>


                </div>



                <div>


                    <p class="text-sm font-medium text-slate-800">

                        Task submitted

                    </p>


                    <span class="text-xs text-slate-500">

                        3 hours ago

                    </span>


                </div>


            </div>


        </div>





        {{-- User Profile --}}
        <div
            x-data="{open:false}"
            class="relative">


            <button

                @click="open=!open"

                class="
                flex
                items-center
                gap-3
                hover:bg-slate-50
                rounded-xl
                px-3
                py-2
                transition">


                {{-- Avatar --}}
                <div
                    class="
                    w-10
                    h-10
                    rounded-full
                    bg-slate-900
                    text-white
                    flex
                    items-center
                    justify-center
                    font-bold">


                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}


                </div>




                {{-- User Details --}}
                <div class="text-right">


                    <p class="text-sm font-semibold text-slate-800">

                        {{ Auth::user()->name }}

                    </p>


                    <p class="text-xs text-slate-500">

                        Administrator

                    </p>


                </div>



                <span class="text-slate-500">

                    ▼

                </span>


            </button>





            {{-- Profile Dropdown --}}
            <div

                x-show="open"

                @click.outside="open=false"

                x-transition

                class="
                absolute
                right-0
                mt-3
                w-56
                bg-white
                rounded-2xl
                shadow-xl
                border
                border-slate-200
                p-3
                z-50">


                <a
                    href="#"
                    class="
                    block
                    px-4
                    py-2
                    rounded-lg
                    hover:bg-slate-100
                    text-sm
                    text-slate-700">

                    Profile

                </a>



                <a
                    href="#"
                    class="
                    block
                    px-4
                    py-2
                    rounded-lg
                    hover:bg-slate-100
                    text-sm
                    text-slate-700">

                    Settings

                </a>



                <div class="border-t border-slate-200 my-2"></div>




                <form method="POST" action="{{ route('logout') }}">

                    @csrf


                    <button

                        type="submit"

                        class="
                        w-full
                        text-left
                        px-4
                        py-2
                        rounded-lg
                        hover:bg-red-50
                        text-sm
                        text-red-600">


                        Logout


                    </button>


                </form>



            </div>


        </div>


    </div>


</header>