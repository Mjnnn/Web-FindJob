const $=document.querySelector.bind(document);
const $$=document.querySelectorAll.bind(document);

const li=$$('.nav-item-info');
const tabs=$$('.tab-content');

const liActive=$('.nav-active');

console.log(li,tabs);

li.forEach((nav, index)=>{
    const tab=tabs[index]
    nav.onclick=function(){
    
        $('.nav-active').classList.remove('nav-active')
        this.classList.add('nav-active');
        $('.active').classList.remove('active')
        tab.classList.add('active')
    }
})
