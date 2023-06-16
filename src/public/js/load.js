const modalButton=$('.modal-button')
const loadModal=$('.load-modal')
const closeLoad=$('.js-closeLoad')


closeLoad.click(()=>{
  loadModal.removeClass('openModal')

})

modalButton.click(()=>{
  //$container.removeClass('openModal')
  loadModal.addClass('openModal')
  $container.removeClass('openModal')
  const share=document.getElementsByClassName('share')

  if(share[0].classList.contains('active')===true){
    const message = document.getElementById("twitter-message").value
    console.log(message)
    window.open(`https://twitter.com/intent/tweet?text=${message}`)

  }

  window.setTimeout(complete,3000);
    function complete(){
      $('#loading-main').replaceWith('<div class="complete-content"><div class="complete-alert">AWESOME!</div><div class="check-mark"></div><div class="complete-message">記録・投稿<br>完了しました</div></div>')

     

      console.log("sdf")
     

    }

  window.setTimeout(a,5000);
  function a(){
    loadModal.removeClass('openModal')

  }

})






