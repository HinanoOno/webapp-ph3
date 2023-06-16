<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--csrfトークン用-->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>posse</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/load.css')}}">
  <link rel="stylesheet" href="{{asset('css/calendar.css')}}">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- 日本語化する場合は下記を追 記 -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>



  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
  <div class="modal">
      <div class="modal-wrapper" >
        <button class="modal-close js-closeModal">×</button>
        <div class="modal-content" >
          @csrf
          <div class="modal-leftside">
            <div class="study-day" >
              <P>学習日</P>
              <input type="button"name="study-day" id="calendar-input">
            </div>
            <div class="study-contents">
              <P>学習コンテンツ(複数選択可)</P>
              <div class="box-wrapper">
                <div class="box-item">
                  <input value ="1"type="checkbox" id="n" name="checkbox">
                  <label for="n" class="n checkbox">N予備校</label>
                </div>
                <div class="box-item">
                  <input value="2" type="checkbox" id="dotinstall"name="checkbox">
                  <label for="dotinstall" class="dotinstall checkbox">ドットインストール</label>
                </div> 


              </div>
              <div class="box-wrapper">
                <div class="box-item">
                  <input value="3" type="checkbox" id="posse" name="checkbox">
                  <label for="posse" class="posse checkbox">posse課題</label>
                </div>
              </div> 
            </div>
            <div class="study-languages">
              <P>学習言語(複数選択可)</P>
              <div class="box-wrapper">
                <div class="box-item">
                  <input type="checkbox" id="html" value="1" name="checkbox2">
                  <label for="html" class="html checkbox">HTML</label>
                </div>
                <div class="box-item">
                  <input type="checkbox" id="css" value="2" name="checkbox2" >
                  <label for="css" class="css checkbox">CSS</label>
                </div> 
                <div class="box-item">
                  <input type="checkbox" id="js" value="3" name="checkbox2" >
                  <label for="js" class="js checkbox">JavaScript</label>
                </div> 
              </div>
              <div class="box-wrapper">
                <div class="box-item">
                  <input type="checkbox" id="php" value="4" name="checkbox2">
                  <label for="php" class="php checkbox">PHP</label>
                </div>
                <div class="box-item">
                  <input type="checkbox" id="Laravel" value="5" name="checkbox2">
                  <label for="Laravel" class="laravel checkbox">Laravel</label>
                </div> 
                <div class="box-item">
                  <input type="checkbox" id="sql" value="6" name="checkbox2" >
                  <label for="sql" class="sql checkbox">SQL</label>
                </div> 
                <div class="box-item">
                  <input type="checkbox" id="shell" value="7" name="checkbox2">
                  <label for="shell" class="shell checkbox">SHELL</label>
                </div> 
              </div>
              <div class="box-wrapper">
                <div class="box-item">
                  <input type="checkbox" id="knowledge" value="8" name="checkbox2">
                  <label for="knowledge" class="knowledge checkbox">情報システム基礎知識(その他)</label>
                </div>
              </div>
            </div>

          
  
          </div>
          <div class="modal-rightside">
            <div class="study-time-sum">
              <P>学習時間</P>
              <input type="text" name="study-time" id="study-time">
            </div>
            <div class="twitter-comment">
              <P>Twitter用コメント</P>
              <input type="text" id="twitter-message">
            </div>
            <div class="twitter-share">
              <input type="checkbox" id="share" name="checkbox">
              <label for="share" class="share checkbox"><p>Twitterにシェアする</p></label>
            </div>

    
          </div>
        </div>
        <button class="modal-button"  type="submit"  onclick=regist()>記録・投稿</button>
      </div>

    </div>
  </div>
  <div class="calendar-modal">
    <div class="modal-wrapper2">
      <button class="calendar-modal-close js-closeCalendar">←</button>

      <div class="date-area">
        <button class="front-mark" onclick="prev()">＜</button><p id="title"></p><button class="back-mark" onclick="next()">＞</button>
      </div>
      <!--<div class="sp-area">
        <div class="sp-date">
          <button class="front-mark" onclick="prev()">＜</button><p id="title"></p><button class="back-mark" onclick="next()">＞</button>
        </div>
      </div>-->

      <div class="calendar"></div>
      <button class="decide-button">決定</button>
    </div>

  </div>
  <div class="load-modal" >
    
    <div class="modal-wrapper2" id="loading">
      <button class="modal-close js-closeload">×</button>
      <div id="loading-main">

      </div>
    </div>

  </div>
  
  <header>
    <div class="header-main">
      <div class="header-title">
        <h1 class="header-maintitle"><img src="./img/posselogo.svg" alt="posseロゴ"></h1>
        <h2 class="header-subtitle">4th week</h2>
      </div>
      <div>      
        <button class="header-button js-openModal">記録・投稿</button>
      </div>
    </div>
  </header>
  <main class="container">
    <section class="main-divider">
      <div class="main1">
        <div class="study-time">
          <div class="today-study">
            <div class="study-title">Today</div>
            <span class="study-number">
              <div id="today-hour">{{$todayHour}}</div>
            
            </span>
            <div class="study-hour">hour</div>

          </div>
          <div class="month-study">
            <div class="study-title">Month</div>
            <span class="study-number">
              <div id="month-hour">{{$monthHour}}</div>
        
            </span>
            <div class="study-hour">hour</div>
          </div>
          <div class="total-study">
            <div class="study-title">Total</div>
            <span class="study-number">
              <div id="total-hour">{{$totalHour}}</div>
              
            </span>
            <div class="study-hour">hour</div>

          </div>
        </div>
        <div class="rod-graph">
          <canvas class="rod-canvas"></canvas>

        </div>

      </div>
      <div class="main2">
        <div class="study-language">
          <div class="inner-title">学習言語</div>
          <canvas class="language-circle" id="language-circle"></canvas>

        </div>
        <div class="study-content">
          <div class="inner-title"> 学習コンテンツ</div>
          <canvas class="content-circle" id="content-circle" ></canvas>

        </div>

      </div>

      <div class="sp-area">
        <div class="sp-date">
          <button class="front-mark">＜</button><p>2020年10月</p><button class="back-mark">＞</button>
        </div>
        <button class="sp-button js-openModal" type="submit" >
          記録・投稿
        </button>
      
      </div>
  
     
    
      
    </section>
    <div class="date-area" >
      <button class="before-mark" id='before'>＜</button><p class="day-display" id="day-display"></p>
      <button class="after-mark" id="after">＞</button>
    </div>
    

  
  

    

  </main>
  <script src="{{asset('js/script.js')}}" defer></script>
  <script src="{{asset('js/bottom.js')}}" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" defer></script>
  <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js
  " defer></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 


  <!--<script src="../assets/js/jquery3.6.0.js" defer></script>-->
  <script src="{{asset('js/load.js')}}" defer></script>
  <!--<script src="../assets/js/bottom.js" defer></script>-->
  <script src="{{asset('js/calendar.js')}}"> defer</script>
  
  
  <script>

    /*const jsButton=document.getElementById('modal-button')
    const form=document.getElementById('form')
    const regist= async() => {
      const formData = new FormData(form);
      const path = "./api/regist.php";
      const options = {
        method: 'POST',
        body: formData,
      };
      fetch(path, {method: 'POST', body: formData})
      .then(response => response.json())
      .then(json => {
        console.log('ok')
      })
    }*/
  $(function() {
    $('.modal-button').on('click', function() {
    const studyTime=document.querySelector('#study-time')
    const studyDay=document.querySelector('#calendar-input')
    var checkBox = $('input[name=checkbox]:checked').val();
    var checkBox = $('input[name=checkbox]:checked').map(function(){
      return $(this).val();
    }).get();
            
     var checkBox2 = $('input[name=checkbox2]:checked').map(function(){
        return $(this).val();
     }).get();
            
          
          //var checkBox2 = $('input[name=checkbox2]:checked').val();
    
    var studydate=(studyDay.value).replace(/\s+/g, "0");
    var studydate=studydate.replace('年', "-");
    studydate=studydate.replace('月', "-");
    studydate=studydate.replace('日', "");
      $.ajaxSetup({
        headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
      });
      $.ajax({
        url: '/main',
        type:'post',
        dataType:'text',
        
        data:{
          time:studyTime.value,
          day:studydate,
          content:checkBox,
          language:checkBox2,
          //month:showDisplay.innerHTML
           
        },
      }).then((res) => {
      window.reload();
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
    })
  })
    
    /*const regist=async() => {
     
          //var checkBox = $('input[name=checkbox]:checked').val();
            var checkBox = $('input[name=checkbox]:checked').map(function(){
              return $(this).val();
            }).get();
            
            var checkBox2 = $('input[name=checkbox2]:checked').map(function(){
              return $(this).val();
            }).get();
            
          
          //var checkBox2 = $('input[name=checkbox2]:checked').val();
          console.log(studyDay)
    
      const res=await fetch('/main',{
        method:"POST",
        body:JSON.stringify({
          time:studyTime.value,
          day:studyDay.value,
          content:checkBox,
          language:checkBox2,
          month:showDisplay.innerHTML
           
        }),
        headers:{*/
          //'Accept': 'application/json, */*',
          /*"Content-Type": "application/x-www-form-urlencoded"
        },

        
      });
      const json = await res.json()
      console.log(res)
      console.log(json)
      if(res.status===200){
        alert(json["message"])
      }else{
        alert(json["error"]["message"])
      }
    }*/
    


   
  </script>







  
  





  

</body>
</html>