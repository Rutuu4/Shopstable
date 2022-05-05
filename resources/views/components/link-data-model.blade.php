    <div class="link_data_model relative right-28 top-3  transition duration-500 ease-in-out hidden">

        <!-- This element is to trick the browser into centering the modal contents. -->
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <x-label for="link_name" :value="__('Link name')" />
                        <x-input id="link_name" class="block mt-1 w-full " type="text" name="link_name" required
                            autofocus />

                        <x-label for="link_data" :value="__('Link data')" class="mt-4" />
                        <x-input id="link_data" class="block mt-1 w-full " type="text" name="link_data" required
                            autofocus />
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button onclick="saveLinkData(this)" type="button"
                    class="add_link_data_save w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                <button onclick="toggleLinkData(this)" type="button"
                    class="cancel_link_data_model mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
            </div>
        </div>
    </div>
