document.addEventListener('contextmenu',function(e){
   
e.preventDefault();
});
document.addEventListener("copy",function(e){
   
    e.clipboardData.setData("text/plain","Copying is not allowed");
    e.preventDefault();
    });
    