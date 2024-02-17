const sections= document.querySelectorAll('.section');
const sectBtns= document.querySelectorAll('.controlls');
const sectBtn= document.querySelectorAll('.control');
const allSection= document.querySelector('.main-content');
const nav_list= document.querySelectorAll('.nav-li');
function Page_Transitions(){
    //leap forth of menu items
    for(let i=0;i<nav_list.length;i++){
        nav_list[i].addEventListener('click',function(){
            let currLi=document.querySelectorAll('.active');
            currLi[0].className=currLi[0].className.replace('active','');
            this.className+=' active';
        })
    }

    //Used in button click active section
    for(let i=0;i<sectBtn.length;i++){
        sectBtn[i].addEventListener('click',function(){
            let currBtn= document.querySelectorAll('.active-btn');
            currBtn[0].className=currBtn[0].className.replace('active-btn', '');
            this.className +=' active-btn';
        })
    }

    //Section Will be active and viewed
    allSection.addEventListener('click', function(e){
        const id= e.target.dataset.id;
        console.log(e.target);
        if(id){
            //Here we are removing the selected from other buttons
            sectBtn.forEach(function(btn){
                btn.classList.remove('active');
            })
            e.target.classList.add('active');

            //Hidding the other sections(Multipage er moto show korbe)
            sections.forEach(function(section){
                section.classList.remove('active');
            })

            const element=document.getElementById(id);
            console.log(element);
            console.log(id);
            element.classList.add('active');
        }
    })


    //Js code added for toggling to dark or light mode

    const themeBtn=document.querySelector('.theme-btn');
    themeBtn.addEventListener('click',function(){
        let elem= document.body;
        elem.classList.toggle('light-mode');

    })
}

Page_Transitions();

let text = document.querySelector(".text p");

text.innerHTML = text.innerHTML.split("").map((char,i)=>
    `<b style="transform:rotate(${i * 6.3}deg")>${char}</b>`
).join("");

//nav-bar
var mobMenuContainer = document.getElementById("mobMenuCont");
var mobMenuWrap = document.getElementById("mobMenuWrap");

function mobMenuToggle() {    
    mobMenuContainer.classList.add("displayon");
    mobMenuWrap.classList.add("displayon");
}

function closeMobMenuToggle() {
    mobMenuContainer.classList.remove("displayon");
    mobMenuWrap.classList.remove("displayon");
}

