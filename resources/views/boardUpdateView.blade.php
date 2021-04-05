<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시판 작성') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="skin_btn_area_mov_article">
                    <span class="btn_list"><a href="{{ route('tab2') }}">목록</a></span>
                </div>

                <form method="POST" action="/boardUpdate">
                    @csrf
                <table width="100%"  >
                    <input type="hidden" name="board_no" id="board_no" value="{{$boardView->board_no}}">

                    <thead>
                    </thead>
                    <tbody>
                        <tr><th>제목</th>
                            <td>
                                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $boardView->title }}" required autofocus autocomplete="title" /></td>
                        <tr><th>작성자</th><td> <x-jet-input id="writer" class="block mt-1 w-full" type="text" value="{{ $boardView->writer }}"  name="writer" required autofocus autocomplete="writer" /></td>
                        <tr><th>내용</th><td><textarea id="content" class="block mt-1 w-full" type="text" name="content"   required autofocus autocomplete="content" >{{ $boardView->content }}</textarea> </td>
                    </tbody>
                </table>

                <x-jet-button class="ml-4">
                    {{ __('글 작성') }}
                </x-jet-button>


                </form>

            </div>
        </div>
    </div>
</x-app-layout>
