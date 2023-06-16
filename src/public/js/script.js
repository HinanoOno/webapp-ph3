const $container = $('.modal');
const $button = $('.js-openModal');
const $closeButton = $('.js-closeModal');

$button.click((e) => {
  $container.addClass('openModal');
})

$closeButton.click(() => {
  $container.removeClass('openModal');

})

/*円グラフ*/
window.onload=function(){
  
  
  let ctx=document.querySelector("#language-circle").getContext('2d')
  
   /*fetch('http://posse-task.anti-pattern.co.jp/1st-work/study_language.json')
    .then(response => {
      return response.json();
    })
    .then(data =>{
      console.log(data)
      for (const item of data){
        var name=Object.keys(item)
        console.log(name)
        
        
        for (const key of name){
          var number=item[key]
          
          language.push(number)

        }
      
      

      }*/
      labelName=[];
      colorName=[];
      const languageTime=[]
      $(function(){
        $.ajax({
          type: "get", //HTTP通信の種類
          url:'/chart', //通信したいURL
          dataType: 'json'
        })
        //通信が成功したとき
        .then((res)=>{
          console.log(res)
          for(i=0; i<res.length; i++){
            labelName.push(res[i]['language'])
            colorName.push(res[i]['color_code'])
            languageTime.push(res[i]['sum'])
          }
         
          
          new Chart(ctx,{
            type:'doughnut',
            data:{
              labels:labelName,
              datasets:[{
                backgroundColor: colorName,
                data: languageTime,
              }]
        
            },
            options:{
              plugins: {
                
                legend:{
                  position:'bottom',
                  
                },
                labels: {
                  render: 'percentage',
                  fontColor: 'white',
                  fontSize: 10,
    
                },
                responsive: true,
                maintainAspectRatio: false,
        
              },
            },
          })
          
        })
        //通信が失敗したとき
        .fail((error)=>{
          console.log(error.statusText)
        })
      });
    
    
  
  /*content circle*/
  let area=document.querySelector('#content-circle').getContext('2d')
  const content=[]
  fetch('http://posse-task.anti-pattern.co.jp/1st-work/study_contents.json')
    .then(response =>{
      return response.json();
    })
    .then(data =>{
      
      for (const item of data){
        var name=Object.keys(item)
        for (const key of name){
          var number=item[key]
          
          content.push(number)
        }
        console.log(content)
      }
     
      new Chart(area,{
        type:'doughnut',
        data:{
          labels:name,

          datasets:[{
            backgroundColor:['#0000ff','#4682B4','#48D1CC'],
            data: content,
          }]
    
        },
        options:{
          plugins: {
            
            legend:{
              position:'bottom',
              
            },
            labels: {
              render: 'percentage',
              fontColor: 'white',
              fontSize: 10,

            },
            responsive: true,
            maintainAspectRatio: false,
    
          },
        },
        
      }) 
      })
  







/*棒グラフ*/
    var rod=document.querySelector(".rod-canvas").getContext('2d')
  
    const label=[];
    const time=[];
    fetch('https://posse-task.anti-pattern.co.jp/1st-work/study_time.json')
      .then(response => {
        return response.json();
      })
      .then(data => {
        for(const item of data){
          var day=item.day;
          label.push(day)
  
  
  
          var hour=item.time;
          time.push(hour)
  
          
          
        }
      
      
        new Chart(rod,{
          type:'bar',
          data:{
            labels: label,
            datasets:[{
              data:time ,
              backgroundColor:"#0066cc",
            }],
          },
          options:{
            legend:{
              display:false
            },
            scales:{
              x:{
                scaleLabel:{
                  display:false
                },
                grid:{
                  display:false,

                },
                ticks:{
                  maxRotation:0,
                  minRotation:0,
                  
                  callback: function(value,index){
                  
                    if(index % 2 ===0){
                      return "";
                    }
                    return value+1;
                  }
                }
              },
              y:{
                scaleLabel:{
                  display:false
                },
                grid:{
                  display:false,
                  drawBorder:false
                },
                ticks:{
                  callback:function(tick,index){
                    if(index % 2 ===1){
                      return"";
                    }
                    return tick.toString() + 'h';
                  }
                }
      
              }
            },
            plugins:{
              legend:{
                display:false,
              },
            },
            responsive: true,
            maintainAspectRatio: false,
          },
          
        })
      })
    }


   /*calendar*/
   const calendarButton=$('#calendar-input')
   const calendarContainer=$('.calendar-modal')
   const calendarCloseButton=$('.js-closeCalendar')

   const calendarInput=document.getElementById('calendar-input')
   const decideButton=$('.decide-button')

   const dataArea=document.getElementsByClassName('date-area')

   calendarButton[0].addEventListener("click",()=>{
    calendarContainer[0].classList.add('openModal')
    $container[0].classList.remove('openModal')
    dataArea[0].classList.add('open')

   })
   calendarCloseButton[0].addEventListener("click",()=>{
    calendarContainer[0].classList.remove('openModal')
    $container[0].classList.add('openModal')
    dataArea[0].classList.remove('open')

   })
   decideButton[0].addEventListener("click",()=>{
    calendarContainer[0].classList.remove('openModal')
    $container[0].classList.add('openModal')
   })

   
 


   