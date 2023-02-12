<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-8 ">
            <table class="table-auto mx-auto border-separate text-gray-800 dark:text-gray-200">
                <thead>
                    <tr>
                        <th class="border text-center px-4">No</th>
                        <th class="border text-center px-4">Title</th>
                        <th class="border text-center px-4">Category</th>
                        <th class="border text-center px-4">Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($posts as $post):?>
                    <tr>
                        <td class="border px-2 text-center"><?= $no++ ?></td>
                        <td class="border px-2"><?= $post->title ?></td>
                        <td class="border px-2"><?= $post->category->title ?></td>
                        <td class=" border px-6 py-4">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>

                            <a href="#"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
