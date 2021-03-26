<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시판') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table>
                    <thead>
                        <th>구분</th>
                        <th>정리1</th>
                        <th>정리2</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
