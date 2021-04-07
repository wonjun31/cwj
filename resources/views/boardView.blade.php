<style>
body{background: #333;}
.like-container{filter: url('#filter');}
.like-cnt{
  position: absolute;
  cursor: pointer;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);     background: rgba(255,255,255,0.3);     width: 60px;
  height: 60px;
  border-radius: 50%;
  text-align: center;
  line-height: 75px;
  z-index: 10;
}
.like-btn{
  color: #fff;
}

.gp-header{font-family: georgia; font-size: 40px; color: #ddca7e; font-style: italic; text-align: center; margin-top: 31px;}
.gp-footer{position: fixed; color: #fff; bottom: 10px; left: 50%; font-family: georgia; font-style: italic; transform: translateX(-50%);}
.gp-footer .soc_icons{display: inline-block; color: #ddca7e; margin: 0px 0px;}


::-moz-selection { background: transparent;}
::selection {background: transparent;}
</style>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시판') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


        <div class="skin_free">

            <div id="skin_mw" class="skin_mw">
                <div class="bg"><!-- Don't put here any content --></div>
                <div class="fg">
                    <div class="cont_wrap">

                        </div>
                    </div>
                </div>
            </div>

            <div class="skin_btn_area_mov_article">
                <span class="btn_list"><a href="{{ route('tab2') }}">목록</a></span>
                <span class="btn_next"><a href="#">윗글</a></span>
                <span class="btn_prev"><a href="#">아랫글</a></span>
            </div>


            <table width="100%"  >

                <thead>
                </thead>
                <tbody>
                    <tr><th>제목</th>
                        <td>
                            {{ $boardView->title }}</td>
                    <tr><th>작성자</th><td> {{ $boardView->writer }} <span class="hit">조회수 {{ $boardView->views }}</span></td>
                    <tr><th>내용</th><td>{{ $boardView->content }} </td>
                    <tr><th>파일</th><td>
                        <img src="{{asset('storage/images/'.$boardView->subFile.'')}}"/>
                        <a href="{{ route('subDown', ['subFile' => $boardView->subFile] ) }}">{{ $boardView->fileNm}} </a> </td>
                </tbody>

            </table>


            <a href="{{ route('boardUpdateView', ['board_no' => $boardView->board_no] ) }}">
                <x-jet-button class="ml-4">
                    {{ __('글 수정하기') }}
                </x-jet-button>
            </a>
            <button  onclick="fn_like({{$boardView->board_no}});">
                <div class="uoc-icon">
                    <span id="likeCnt" >{{ __('좋아요') }} {{$boardView->likeCnt }}</span>
                </div>
            </button>



        </div>
    </div>


        </div>


    </div>
</x-app-layout>
