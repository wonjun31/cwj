<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시판') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table width="100%"  >
                    <colgroup>
                        <col width="10">
                        <col width="40">
                        <col width="30">
                        <col width="20">
                    </colgroup>
                    <thead>
                        <th scope="col">No</th>
                        <th scope="col">제목</th>
                        <th scope="col">작성자</th>
                        <th scope="col">조회수</th>
                    </thead>
                    <tbody>
                        @foreach ($board as $bo)
                            <tr>
                                <td> {{ $bo->board_no }}</td>
                                <td><a href="{{ route('boardView', ['board_no' => $bo->board_no] ) }}">{{ $bo->title }}</a></td>
                                <td>{{ $bo->writer }}</td>
                                <td>{{ $bo->views }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <a href="{{route('boardWrite')}}"><x-jet-button class="ml-4">
                        {{ __('글 쓰기') }}
                    </x-jet-button></a>
                </table>

                <div>{{ $board->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
