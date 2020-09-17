function changeDir(id) {
    let inputName=document.getElementById(id);
    if(inputName.value===""){
        inputName.dir="rtl";
    }else{
        inputName.dir="ltr";
    }
}