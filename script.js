const sections= document.querySelectorAll('.section');
const sectBtns= document.querySelectorAll('.controlls');
const sectBtn= document.querySelectorAll('.control');
const allSection= document.querySelector('.main-content');

function Page_Transitions(){
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