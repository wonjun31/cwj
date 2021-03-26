{{$def['OccuName']['일반']}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<body>

<div id="app">
    {{ message }}
  </div>

  <div id="app-2">
    <span v-bind:title="message">
      내 위에 잠시 마우스를 올리면 동적으로 바인딩 된 title을 볼 수 있습니다!
    </span>
  </div>


  <div id="app-3">
    <h1 v-if="awesome">Vue is awesome!</h1>
    <h1 v-else>Oh no 😢</h1>

    <template v-if="ok">
        <h1>Title</h1>
        <p>Paragraph 1</p>
        <p>Paragraph 2</p>
      </template>

      <div v-if="type === 'A'">
        A
      </div>
      <div v-else-if="type === 'B'">
        B
      </div>
      <div v-else-if="type === 'C'">
        C
      </div>
      <div v-else>
        Not A/B/C
      </div>


  </div>


  <div>
    <ul id="example-1">
        <li v-for="(item,index) in items">
          {{index}} - {{ item.message }}
        </li>
      </ul>

      <ul id="example-2">
        <li v-for="(value,name,index) of items">
          {{index}} - {{ value }} - {{name}}
        </li>

        <li>{{testFun()}}</li>
      </ul>


  </div>

  <div id="example-3">
    <simple-counter></simple-counter>
  </div>

  <div id="example-4"><input v-bind:type ="type" v-bind:value="inputValue"></div>



  <script>


var app = new Vue({
    el: '#app',
    data: {
        message: 'Vue!'
    }
})
var app2 = new Vue({
    el: '#app-2',
    data: {
        message: '이 페이지는 ' + new Date() + ' 에 로드 되었습니다'
    }
})

var app3 = new Vue({
    el: '#app-3',
    data: {
        awesome:false,
        ok:true,
    type : "FA"
    }
})

var app6 =new Vue({
    el: '#example-4',
    data: {
      type : "number",
      inputValue : "hello"
    }
})


var example1 = new Vue({
    el: '#example-1',
    data: {
        items: [
            { message: 'A' , title : "rue" },
            { message: 'B' },
            { message: 'C' },
            { message: 'D' }
        ]
    }
})


var example2 = new Vue({
    el: '#example-2',
    data: {
        items: {
            title : "Test",
            value : "인생",
            id : "9438"
        }
    },
     methods: {
       testFun : function(){
         return this.items.title
       }
     }
})

var data = { counter: 0 }

Vue.component('simple-counter', {
  template: '<button v-on:click="counter += 1">{{ counter }}</button>',
  // 데이터는 기술적으로 함수이므로 Vue는 따지지 않지만
  // 각 컴포넌트 인스턴스에 대해 같은 객체 참조를 반환합니다.
  data: function () {
    return data
  }
})

var vv =new Vue({
  el: '#example-3'
})

    </script>


