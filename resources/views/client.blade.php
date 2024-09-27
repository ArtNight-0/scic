<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're in Client") }}
                </div>

                <div class="container">
                    @foreach ($clients as $client)
                        <div class="py-3 container text-white">
                            <h3>{{ $client->name }}</h3>
                            <p>{{ $client->redirect }}</p>
                            <p>{{ $client->secret }}</p>
                        </div>
                    @endforeach
                </div>

                <hr>
                <div class="container">
                    <form action="/oauth/clients" method="POST">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="max-w-sm">
                                <div class="flex justify-between items-center">
                                    <label for="with-corner-hint"
                                        class="block text-sm font-medium mb-2 dark:text-white">Client</label>
                                    <span
                                        class="block mb-2 text-sm text-gray-500 dark:text-neutral-500">client-name</span>
                                </div>
                                <input type="text" name="name" id="with-corner-hint"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="jhon doe">
                            </div>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="max-w-sm">
                                <div class="flex justify-between items-center">
                                    <label for="with-corner-hint"
                                        class="block text-sm font-medium mb-2 dark:text-white">Redirect</label>
                                    <span
                                        class="block mb-2 text-sm text-gray-500 dark:text-neutral-500">redirect-link</span>
                                </div>
                                <input type="text" name="redirect" id="with-corner-hint"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="you@site.com">
                            </div>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @csrf
                            <button type="submit"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
