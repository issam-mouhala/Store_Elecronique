let products=document.getElementById("products");
let n=10;
for (let i = 1; i < n+1; i++) {
    let product=document.createElement("div");
    let product_img=document.createElement("div");
    let product_price=document.createElement("div");
    let h1=document.createElement("h1");
    let h2=document.createElement("h2");
    let img=document.createElement("img");
    let a=document.createElement("a");
    let panier_paye=document.createElement("div");
    let panier=document.createElement("i");
    let paye =document.createElement("h1");
    let del=h2.cloneNode(true);
    let price=Math.floor(Math.random()*100);
    let product_name=["Pc Laptob 350G sdd", "Pc Complet + clavie","Screen Appel","Pc + Picker","Clavie","Mouse","Cable USB","Pack Cable","Phone Glaxsy G5","Laptob 460G"]
    paye.textContent="Payer";
   
    paye.className="paye"
    paye.setAttribute("name","paye");

    panier_paye.className="panier_paye";
    panier.className="fa-solid fa-cart-plus panier";
    panier.id="product"+i;
    panier.setAttribute("data-click","false");
    panier_paye.append(paye,panier);
    panier_paye.setAttribute("action","..\\signin\\save_data.php");
    panier_paye.setAttribute("method","post")
    product.className="product"+i;
    product.id="product";
    del.innerText="$"+(price+12);
    product_img.className="product"+i+"_img"+" product_img";
    product_price.className="product"+i+"_price product_price";
    h1.innerText=product_name[i-1];
    panier.dataset.name_product=h1.innerText;
    h2.innerText="Price $"+price;
    img.setAttribute("src","../img/stock/stock_img"+i+".jpg");
    img.setAttribute("alt","img"+i);
    a.append(h2);
    product_img.appendChild(img);
    product_price.append(a,del);
    product.append(product_img,h1,product_price,panier_paye);
    products.appendChild(product);
}
// let switch_img=document.querySelectorAll("#switch_imgs img");
// let left=document.getElementById("left");
// let right=document.getElementById("right");
// let switch_imgs=document.querySelector("#switch_imgs");
// left.onclick=()=>{
//     if (switch_imgs.dataset.i!=1) {  
//         switch_img[1].style.filter="blur(10px)";  
//         switch_img[1].setAttribute("src","../img/img"+(--switch_imgs.dataset.i)+".jpg") 
//         switch_imgs.setAttribute("src","../img/img"+(--switch_imgs.dataset.i)+".jpg") ;
//         switch_img[0].setAttribute("src","../img/img"+(+switch_imgs.dataset.i-1)+".jpg") 
//         switch_img[2].setAttribute("src","../img/img"+(+switch_imgs.dataset.i + +1)+".jpg")
//         setTimeout(()=>{
//             switch_img[1].style.filter="blur(0px)";  

//         },300) 
//     }
           
// }
// right.onclick=()=>{
//     if (switch_imgs.dataset.i!=6) { 
//         switch_img[1].style.filter="blur(10px)";
//         switch_img[1].setAttribute("src","../img/img"+(++switch_imgs.dataset.i)+".jpg") 
//         switch_imgs.style.backgroundImage='url("../img/img'+(++switch_imgs.dataset.i)+'".jpg")'
//         switch_img[0].setAttribute("src","../img/img"+(+switch_imgs.dataset.i-1)+".jpg") 
//         switch_img[2].setAttribute("src","../img/img"+(+switch_imgs.dataset.i + +1)+".jpg") 
//         setTimeout(()=>{
//             switch_img[1].style.filter="blur(0px)";

//         },300)
//     }
             
// }
let product_price=document.querySelectorAll(".panier");
let span=document.querySelector("#sale");
let sale_inc=document.querySelector("#sale_inc");
let sale_display=document.querySelector("#sale_display ol");
let sale_displays=document.querySelector("#sale_display");
product_price.forEach(e => {
    e.onclick=()=>{
        if(e.dataset.click=="false"){
              let li=document.createElement("li");
    let x=document.createElement("div");
    x.innerText="x";
    li.innerText=e.dataset.name_product;
    x.id="x"
    li.id="product_choise"
    li.dataset.color=x.dataset.color=e.id;
    const cdate= new Date();
    x.className=li.className=e.id="panier"+cdate.getTime()
    li.append(x)
    span.innerText=parseInt( span.innerText)+1;
    sale_display.appendChild(li)
    e.style.backgroundColor="red";
    e.dataset.click="true";
    let input=document.querySelector("input");
     
    
        }else{
             e.style.backgroundColor="rgba(212, 80, 241, 0.337)";
             span.innerText=parseInt( span.innerText)-1;
           
             document.querySelector("."+e.id).remove();
             e.dataset.click="false";
        }
        let x=document.querySelectorAll("#x");
x.forEach((e)=>{
e.onclick=()=>{  
    document.querySelector("#"+e.className).dataset.click=false;
    document.querySelector("."+e.className).remove();
    document.querySelector("#"+e.className).style.backgroundColor="rgba(212, 80, 241, 0.337)"
    span.innerText=parseInt( span.innerText)-1;
}

})
  
}
});
sale_inc.onclick=()=>{
    if(sale_inc.dataset.click=="false"){
     sale_displays.style.display="block"; 
     sale_inc.dataset.click="true"  
    }else{
        sale_displays.style.display="none";
        sale_inc.dataset.click="false"
    }

}
