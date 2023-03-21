<div class="flex flex-row mt-4">
    <div class="basis-2/3 border mx-auto my-4 flex flex-row ">
        <ul class="list-none flex">
            <li class="mr-6">
                <a
                    class="hover:text-blue-800  {{ Route::current()->getName() == 'developers.show' ? 'text-green-500' : 'text-blue-500' }}"
                    href="{{ route('developers.show') }}"
                >
                    Show Developers
                </a>
            </li>

            <li class="mr-6">
                <a
                    class="hover:text-blue-800 {{ Route::current()->getName() == 'importWithQueue.show' ? 'text-green-500' : 'text-blue-500' }}"
                    href="{{ route('importWithQueue.show') }}"
                >
                    Import With Queue
                </a>
            </li>

            <li class="mr-6">
                <a
                    class="hover:text-blue-800 {{ Route::current()->getName() == 'importWithLaravelExcel.show' ? 'text-green-500' : 'text-blue-500' }}"
                    href="{{ route('importWithLaravelExcel.show') }}"
                >
                    Import With Laravel Excel
                </a>
            </li>

        </ul>
    </div>
</div>
