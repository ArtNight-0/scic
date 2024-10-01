<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Dashboard
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <!-- Card -->
        <a href="http://simulator.issp.id/" target="blank">
            <div class="flex mt-10 items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-80 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105" style="hover: margin-top: 50px;">
                <div>
                    <img class="w-full py-3" src="{{ asset('assets/img/Dashboard/Smart City.JPG') }}" alt="">
                    <h2 class="mb-2 mt-3 text-lg[15px] font-bold text-gray-600 dark:text-gray-400">
                        SMART CITY
                    </h2>
                    <p class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        www.smartcity.com
                    </p>
                </div>
            </div>
        </a>

        <!-- Card -->
        <a href="">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-80 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
                <div>
                    <img class="w-full py-3" src="{{ asset('assets/img/Dashboard/Smart Building.JPG') }}" alt="">
                    <h2 class="mb-2 mt-3 text-lg[15px] font-bold text-gray-600 dark:text-gray-400">
                        SMART BUILDING
                    </h2>
                    <p class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        www.smartbuilding.com
                    </p>
                </div>
            </div>
        </a>

        <!-- Card -->
        <a href="">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-80 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
                <div>
                    <img class="w-full py-3" src="{{ asset('assets/img/Dashboard/Smart Mobiilty.JPG') }}" alt="">
                    <h2 class="mb-2 mt-3 text-lg[15px] font-bold text-gray-600 dark:text-gray-400">
                        SMART MOBILTY
                    </h2>
                    <p class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        www.smartmobility.com
                    </p>
                </div>
            </div>
        </a>

        <!-- Card -->
        <a href="">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-80 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
                <div>
                    <img class="w-full py-3" src="{{ asset('assets/img/Dashboard/Smart Health Care.JPG') }}" alt="">
                    <h2 class="mb-2 mt-3 text-lg[15px] font-bold text-gray-600 dark:text-gray-400">
                        SMART HEALTHCARE
                    </h2>
                    <p class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        www.smarthealthcare.com
                    </p>
                </div>
            </div>
        </a>

        <!-- Card -->
        <a href="">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-80 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
                <div>
                    <img class="w-full py-3 rounded-lg" src="{{ asset('assets/img/Dashboard/Smart Payment.jpg') }}" alt="">
                    <h2 class="mb-2 mt-3 text-lg[15px] font-bold text-gray-600 dark:text-gray-400">
                        SMART PAYMENT
                    </h2>
                    <p class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        www.smartpayment.com
                    </p>
                </div>
            </div>
        </a>
    </div>

    <!-- Charts -->
    {{-- {{-- <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Revenue
            </h4>
            <canvas id="pie"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                    <span>Shirts</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                    <span>Shoes</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Bags</span>
                </div>
            </div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Traffic
            </h4>
            <canvas id="line"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                    <span>Organic</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Paid</span>
                </div>
            </div>
        </div>
    </div> --> --}}
</div>
