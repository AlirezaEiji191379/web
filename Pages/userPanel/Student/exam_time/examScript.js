var radio = document.getElementsByClassName("qBox")[0]
var divContainer = document.getElementById("container")



for (var i = 1; i <= 500; i++) {
    var cln = radio.cloneNode(true)
    var h5 = document.createElement("h5")
    h5.innerHTML = i
    h5.className = "qTitle"
    cln.insertBefore(h5, cln.firstChild)
        // radio.getElementsByClassName("qTitle")[i].innerHTML = "hiii"
        // var text = document.createTextNode(i)
        // cln.appendChild(text)
    divContainer.appendChild(cln)


    // document.getElementsByClassName("radioInputs")[i+3].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+50].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+100].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+150].setAttribute('name', ("question:" + i))
    // console.log(document.getElementsByClassName("radioInputs")[i*0].getAttribute('name'))
    // document.getElementsByClassName("radioInputs")[i*1+3].setAttribute('name', ("question:" + i))
    // // console.log(document.getElementsByClassName("radioInputs")[i*1].getAttribute('name'))
    // document.getElementsByClassName("radioInputs")[i*2+3].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*3+3].setAttribute('name', ("question:" + i))



    // document.getElementsByClassName("radioInputs")[i*0+4].setAttribute('id', ("id" + (i*0)))
    // document.getElementsByClassName("radioLabels")[i*0+4].setAttribute('for', ("id" + (i*0)))

    // document.getElementsByClassName("radioInputs")[i*1+4].setAttribute('id', ("id" + (i*1)))
    // document.getElementsByClassName("radioLabels")[i*1+4].setAttribute('for', ("id" + (i*1)))

    // document.getElementsByClassName("radioInputs")[i*2+4].setAttribute('id', ("id" + (i*2)))
    // document.getElementsByClassName("radioLabels")[i*2+4].setAttribute('for', ("id" + (i*2)))

    // document.getElementsByClassName("radioInputs")[i*3+4].setAttribute('id', ("id" + (i*3)))
    // document.getElementsByClassName("radioLabels")[i*3+4].setAttribute('for', ("id" + (i*3)))
    if (i > 100) {
        cln.style.display = "none"
    }
}

radio.style.display = "none"

// console.log(document.getElementsByClassName("radioInputs").length)


var counter = 0;
var a = document.getElementsByClassName("radioId")
console.log(a.length)
for (var i = 0; i < a.length; i++) {


    var b = a[i].getElementsByClassName("radioInputs")
        // console.log(b)
        // console.log(b.length)
    for (var j = 0; j < b.length; j++) {
        b[j].name = "Question:" + i
    }



    // if(i%4==0){
    //     counter++;
    // }
    // document.getElementsByClassName("radioInputs")[i].setAttribute('name', ("question:" + counter))


    // document.getElementsByClassName("radioInputs")[i*0].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+50].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+100].setAttribute('name', ("question:" + i))
    // document.getElementsByClassName("radioInputs")[i*0+150].setAttribute('name', ("question:" + i))


    //     document.getElementsByClassName("radioInputs")[i*0].setAttribute('name', ("question:" + i))
    //     console.log(document.getElementsByClassName("radioInputs")[i*0].getAttribute('name'))
    //     document.getElementsByClassName("radioInputs")[i*1].setAttribute('name', ("question:" + i))
    //     console.log(document.getElementsByClassName("radioInputs")[i*1].getAttribute('name'))
    //     document.getElementsByClassName("radioInputs")[i*2].setAttribute('name', ("question:" + i))
    //     document.getElementsByClassName("radioInputs")[i*3].setAttribute('name', ("question:" + i))
}

for (var i = 1; i <= 500; i++) {


    document.getElementsByClassName("radioInputs")[i * 0 + 4].setAttribute('id', ("id" + (i * 0)))
    document.getElementsByClassName("radioLabels")[i * 0 + 4].setAttribute('for', ("id" + (i * 0)))

    document.getElementsByClassName("radioInputs")[i * 1 + 4].setAttribute('id', ("id" + (i * 1)))
    document.getElementsByClassName("radioLabels")[i * 1 + 4].setAttribute('for', ("id" + (i * 1)))

    document.getElementsByClassName("radioInputs")[i * 2 + 4].setAttribute('id', ("id" + (i * 2)))
    document.getElementsByClassName("radioLabels")[i * 2 + 4].setAttribute('for', ("id" + (i * 2)))

    document.getElementsByClassName("radioInputs")[i * 3 + 4].setAttribute('id', ("id" + (i * 3)))
    document.getElementsByClassName("radioLabels")[i * 3 + 4].setAttribute('for', ("id" + (i * 3)))

    //     document.getElementsByClassName("radioInputs")[i*0].setAttribute('id', ("id" + (i*0)))
    //     document.getElementsByClassName("radioLabels")[i*0].setAttribute('for', ("id" + (i*0)))

    //     document.getElementsByClassName("radioInputs")[i*1].setAttribute('id', ("id" + (i*1)))
    //     document.getElementsByClassName("radioLabels")[i*1].setAttribute('for', ("id" + (i*1)))

    //     document.getElementsByClassName("radioInputs")[i*2].setAttribute('id', ("id" + (i*2)))
    //     document.getElementsByClassName("radioLabels")[i*2].setAttribute('for', ("id" + (i*2)))

    //     document.getElementsByClassName("radioInputs")[i*3].setAttribute('id', ("id" + (i*3)))
    //     document.getElementsByClassName("radioLabels")[i*3].setAttribute('for', ("id" + (i*3)))

}
function getAnsFromDataBase() {
    let xmlHttpRequest=new XMLHttpRequest();
    xmlHttpRequest.onreadystatechange=function () {
        if(this.readyState==4 && this.status==200){
             var examData=JSON.parse(this.responseText);
             let array=[];
             for(key in examData){
                 if(key=="time"){
                    totalSeconds=examData[key];
                 }else if(key=="points"){
                    points=examData[key];
                 }
                 else {
                     array[parseInt(key)] = examData[key];
                 }
             }
             for(i=1;i<array.length;i++){
                 if(array[i]==0) continue;
                 var a = document.getElementsByClassName("radioId")
                 var b = a[i].getElementsByClassName("radioInputs")
                 b[array[i]-1].checked=true;
             }
        }
    };
    xmlHttpRequest.open("GET","../../../../includes/userPanel/getExamData.php",false);
    xmlHttpRequest.send();
}







function createRadioButtons(name, container) {
    var radioClass = document.createElement("div")
    radioClass.className = "radioClass"

    var radoioCustom = document.createElement("div")
    radoioCustom.className = "custom-radios"
    radioClass.appendChild(radoioCustom)

    var divVar = document.createElement("div")
    radoioCustom.appendChild(divVar)
    var input = document.createElement("input")
    input.type = "radio"
    input.name = name
    input.id = name + "1"
    console.log(input.name)
    input.value = "1"
    input.className = "radioInputs color-1"
    divVar.appendChild(input)

    // input.onclick =  function() {
    //     console.log(input.name)
    // }

    var label = document.createElement("label")
    label.for = name + "1"
    label.className = "radioLabels"
    divVar.appendChild(label)

    var span = document.createElement("span")
    label.appendChild(span)
    var img = document.createElement("img")
    img.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg"
    img.alt = "Checked Icon"
    span.appendChild(img)



    var divVar2 = document.createElement("div")
    radoioCustom.appendChild(divVar2)
    var input2 = document.createElement("input")
    input2.type = "radio"
    input2.name = name
    input2.id = name + "2"
    console.log(input2.name)
    input2.value = "2"
    input2.className = "radioInputs color-2"
    divVar2.appendChild(input2)


    var label2 = document.createElement("label")
    label2.for = name + "2"
    label2.className = "radioLabels"
    divVar2.appendChild(label2)

    var span2 = document.createElement("span")
    label2.appendChild(span2)
    var img2 = document.createElement("img")
    img2.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg"
    img2.alt = "Checked Icon"
    span2.appendChild(img2)

    container.appendChild(radioClass)
}

// createRadioButtons("q1", divContainer)

// console.log(document.getElementsByClassName("radioInputs").length)

function onSubmit(formArray) {
    // function objectifyForm(formArray) {//serialize data function

    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
    //   }
}



function submitForm(e) {
    e.preventDefault();


    postNote()

}

function postNote() {
    console.log("at")
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://raamaangroup.com/saveExam.php", true);
    xhttp.setRequestHeader("Content-Type", "application//json;charset=UTF-8");
    // var data = {
    //   title: noteTitle,
    //   text: noteBody,
    //   color: color,
    // };
    var data = "ali"
    xhttp.send(data);

    //     fetch('http://raamaangroup.com/saveExam.php')
    //   .then(response => response.json())
    //   .then(data => console.log(data));
}

function saveToDB(event) {
    event.returnValue='';
    var a = document.getElementsByClassName("radioId");
    let arr=[];
    for(let i=1;i<points+1;i++){
        var b=a[i].getElementsByClassName("radioInputs")
        for(let j=0;j<4;j++){
            if(i>points) continue;
            if(b[j].checked==true){
                arr[i]=j+1;
                break;
            }
        }
    }
    let xml=new XMLHttpRequest();
    xml.onreadystatechange=function () {
        if(this.status==200&& this.readyState==4){
            console.log(this.responseText);
        }
    };
    xml.open("POST","../../../../includes/userPanel/saveDataInDatabase.php");
    xml.setRequestHeader("Content-Type", "application/json");
    let obj={answers:arr};
    let data=JSON.stringify(obj);
    xml.send(data);
}



//   // Set the date we're counting down to
// var countDownDate = new Date("July 21, 2020 23:20:0").getTime();

// // Update the count down every 1 second
// var x = setInterval(function() {

//   // Get today's date and time
//   var now = new Date().getTime();

//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the result in the element with id="demo"
//   document.getElementById("demo").innerHTML =
//   + minutes + "m " + seconds + "s ";

//   // If the count down is finished, write some text 
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("demo").innerHTML = "EXPIRED";
//   }
// }, 1000);

var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds =0;
var points=0;
let x=setInterval(setTime, 1000);
getAnsFromDataBase()
function setTime() {
    totalSeconds--;
    if(totalSeconds==-1){
        window.removeEventListener('beforeunload',saveToDB);
        document.getElementById("form").submit();
        clearInterval(x);
        saveToDB();
        return;
    }
    secondsLabel.innerHTML = pad(totalSeconds % 60);
    minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
}
 window.addEventListener('beforeunload',saveToDB);