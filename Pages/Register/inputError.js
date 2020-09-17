function checkValidUsername() {
    let usernameInput=document.getElementById("usernameInput");
    let usernameError=document.getElementById("usernameError");
    let usernameValue=usernameInput.value;
    let regexErrorMessage="نام کاربری فقط شامل حروف انگلیسی و اعداد است!";
    let numericErrorMessage="نام کاربری باید حداقل 8 کاراکتر داشته باشد!";
    let notAlpha="نام کاربری باید شامل حرف انگلیسی باشد!";
    const reg=RegExp("[^A-Za-z0-9]");
    if(reg.test(usernameValue)==false){
        if(usernameValue.length<8){
            usernameError.innerHTML=numericErrorMessage;
            usernameError.style.color="red";
            return;
        }else{
            let pattern=RegExp("[A-Za-z]");
            if(usernameValue.match(pattern)===null){
                usernameError.innerHTML=notAlpha;
                usernameError.style.color="red";
                return;
            }
            let xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    usernameError.innerHTML=this.responseText;
                    if(usernameError.innerHTML=="نام کاربری معتبر است!"){
                        usernameError.style.color="green";
                    }else{
                        usernameError.style.color="red";
                    }

                }
            };
            xhttp.open("GET","../../includes/Register/checkFromDb.php?username="+usernameValue,true);
            xhttp.send();
        }
    }else{
        usernameError.innerHTML = regexErrorMessage;
        usernameError.style.color = "red";
            return;
    }
}

function checkValidPassword(){
    let passwordInput=document.getElementById("passwordInput");
    let repeatInput=document.getElementById("confirmInput");
    let passwordError=document.getElementById("passwordError");
    let regexErrorMessage="رمز عبور باید شامل حروف انگلیسی اعداد و نشانه ها باشد!";
    let numericError="رمز عبور باید حداقل 6 حرف باشد!";
    let notEqualError="رمز عبور های وارد شده یکسان نیستند!";
    //let correctPassword="رمز عبور معتبر است!";
    let passwordValue=passwordInput.value;
    const regex=RegExp("[^a-zA-Z0-9@#$%*_=+\\|/]");
    if(regex.test(passwordValue)==false) {
        if (passwordValue.length < 6) {
            passwordError.innerHTML = numericError;
            passwordError.style.color = "red";
            return;
        } else {
            if (repeatInput.value !== passwordValue) {
                passwordError.innerHTML = notEqualError;
                passwordError.style.color = "red";
                return;
            }
            passwordError.innerHTML ="";
            return;
        }
    }else {
        passwordError.innerHTML=regexErrorMessage;
        passwordError.style.color="red";
        return;
    }
}

function checkValidEmail() {
    let emailInput = document.getElementById("emailInput");
    let emailValue = emailInput.value;
    let emailError = document.getElementById("emailError");
    let xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            emailError.innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","../../includes/Register/checkFromDb.php?email="+emailValue,true);
    xhttp.send();
}
function checkValidName(input) {
    let inputName;
    let anotherInput;
    if(input==="firstNameInput"){
        inputName=document.getElementById("firstNameInput");
        anotherInput=document.getElementById("lastNameInput");
    }else if(input==="lastNameInput"){
        anotherInput=document.getElementById("firstNameInput");
        inputName=document.getElementById("lastNameInput");
    }
    let nameErrorMessage="لطفا نام و نام خانوادگی معتبر وارد کنید!";
    let nameError=document.getElementById("nameError");
    const regex=RegExp("[^A-Za-zا-ی ]");
    let nameValue=inputName.value;
    if(regex.test(nameValue)==false){
        if(regex.test(anotherInput.value)==false){
            nameError.innerHTML="";
            return;
        }
        else{
            nameError.innerHTML=nameErrorMessage;
            nameError.style.color="red";
            return;
        }
    }else{
        nameError.innerHTML=nameErrorMessage;
        nameError.style.color="red";
        return;
    }
}

function checkValidPhoneNumber() {
    let phoneNumberInput=document.getElementById("phoneNumberInput");
    let phoneNumberValue=phoneNumberInput.value;
    let phoneNumberError=document.getElementById("phoneError");
    if(phoneNumberValue===""){
        phoneNumberInput.dir="rtl";
    }else{
        phoneNumberInput.dir="ltr";
    }
    const regex=RegExp("09[0-9]{9}");
    if(regex.test(phoneNumberValue)==false){
        phoneNumberError.innerHTML="لطفا شماره تلفن معتبر وارد کنید!";
        phoneNumberError.style.color="red";
        return;
    }else{
         phoneNumberError.innerHTML="";
        let xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                phoneNumberError.innerHTML=this.responseText;
            }
        };
        xhttp.open("GET","../../includes/Register/checkFromDb.php?phone="+phoneNumberValue,true);
        xhttp.send();
    }
}

function submitCode() {
    let username=document.getElementById("usernameInput").value.trim();
    let password=document.getElementById("passwordInput").value.trim();
    let repeat=document.getElementById("confirmInput").value.trim();
    let email=document.getElementById("emailInput").value.trim();
    let firstName=document.getElementById("firstNameInput").value.trim();
    let lastName=document.getElementById("lastNameInput").value.trim();
    let form=document.getElementById("myForm");

    let usernameError=document.getElementById("usernameError").innerHTML;
    let passwordError=document.getElementById("passwordError").innerHTML;
    let emailError=document.getElementById("emailError").innerHTML;
    let phoneError=document.getElementById("phoneError").innerHTML;
    let nameError=document.getElementById("nameError").innerHTML;

    if(username==="" || password==="" || repeat==="" || email==="" || firstName===""|| lastName===""){
        form.action="Register.php?error=1";
        return;
    }
    if(usernameError===""){
        if(passwordError===""){
            if(emailError===""){
                if(phoneError===""){
                    if(nameError===""){
                        form.action="../../includes/Register/sendEmailCode.php";
                    }else{
                        form.action="Register.php?error=2";
                    }
                }else{
                    form.action="Register.php?error=2";
                }
            }else{
                form.action="Register.php?error=2";
            }
        }else{
            form.action="Register.php?error=2";
        }
    }else{
        form.action="Register.php?error=2";
    }
}

function changeDir(id) {
    let inputName=document.getElementById(id);
    if(inputName.value===""){
        inputName.dir="rtl";
    }else{
        inputName.dir="ltr";
    }
}
