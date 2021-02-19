let form = document.getElementById("contact_us");

function handleForm(event) {
    event.preventDefault();
    if (!event.checkValidity || event.checkValidity()) {
        sendRequest(document.getElementById('contact_us').getAttribute('url'), event);
      }
}
form.addEventListener('submit', handleForm);


function sendRequest(url, event) {

    let request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contact_us_ok").style.display = "block";
            document.getElementById("contact_us_fail").style.display = "none";
            event.target.name.value = "";
            event.target.email.value = "";
            event.target.message.value = "";
        }else{
            document.getElementById("contact_us_fail").style.display = "block";
            document.getElementById("contact_us_ok").style.display = "none";
        }
    };
    let obj = {
        'name': event.target.name.value,
        'email': event.target.email.value,
        'message': event.target.message.value
    }
    request.setRequestHeader('content-type' , 'application/json')
    request.send(JSON.stringify(obj));
    return false;
}
