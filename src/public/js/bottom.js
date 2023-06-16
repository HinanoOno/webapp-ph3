const boxItem = document.getElementsByClassName('box-item');
const  n= document.getElementsByClassName('n');
n[0].addEventListener("click", () => {
  n[0].classList.toggle("active");
  boxItem[0].classList.toggle("box-active");
})

const dotinstall=document.getElementsByClassName('dotinstall')
dotinstall[0].addEventListener('click',()=> {
  dotinstall[0].classList.toggle('active')
  boxItem[1].classList.toggle("box-active");
})
const posse=document.getElementsByClassName('posse')
const html=document.getElementsByClassName('html')
const css=document.getElementsByClassName('css')
const js=document.getElementsByClassName('js')
const php=document.getElementsByClassName('php')
const laravel=document.getElementsByClassName('laravel')
const sql=document.getElementsByClassName('sql')
const shell=document.getElementsByClassName('shell')
const knowledge=document.getElementsByClassName('knowledge')
const share=document.getElementsByClassName('share')
posse[0].addEventListener('click',()=>{
  posse[0].classList.toggle('active')
  boxItem[2].classList.toggle("box-active");
})
html[0].addEventListener('click',()=> {
  html[0].classList.toggle('active')
  boxItem[3].classList.toggle("box-active");
})
css[0].addEventListener('click',()=> {
  css[0].classList.toggle('active')
  boxItem[4].classList.toggle("box-active");
})
js[0].addEventListener('click',()=> {
  js[0].classList.toggle('active')
  boxItem[5].classList.toggle("box-active");
})
php[0].addEventListener('click',()=> {
  php[0].classList.toggle('active')
  boxItem[6].classList.toggle("box-active");
})
laravel[0].addEventListener('click',()=> {
  laravel[0].classList.toggle('active')
  boxItem[7].classList.toggle("box-active");
})
sql[0].addEventListener('click',()=> {
  sql[0].classList.toggle('active')
  boxItem[8].classList.toggle("box-active");
})
shell[0].addEventListener('click',()=> {
  shell[0].classList.toggle('active')
  boxItem[9].classList.toggle("box-active");
})
knowledge[0].addEventListener('click',()=> {
  knowledge[0].classList.toggle('active')
  boxItem[10].classList.toggle("box-active");
})
share[0].addEventListener('click',()=>{
  share[0].classList.toggle('active')
  
})
