/*
 *  Titre   :   Titre
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/03/31
 *	Desc.	:	page de traitement de l'ajax
*/

function createPost() {
    const URL = "./filtreCreate.php";
    const FORM = document.getElementById('formPost');

    let formData = new FormData(FORM);
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == XMLHttpRequest.DONE) {
            // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/readyState
            if (this.status == 201) {
           //     window.location = ".";
            } else if (this.status == 400) {
                errorMsg = JSON.parse(this.response);
                document.getElementById('form-alert').innerHTML = "<pre>" + errorMsg + "</pre>";
                document.getElementById('form-alert').classList.add("show");
            } else {
                console.error(this.status + " when call " + URL);
                alert(this.status);
            }
        }
    };
    xhttp.open("POST", URL, true);
    xhttp.send(formData);
}

function editPost(id) {
    const URL = "./filtreEdit.php?id=" + id;
    const FORM = document.getElementById('formPost');

    let formData = new FormData(FORM);
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == XMLHttpRequest.DONE) {
            // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/readyState
            if (this.status == 200) {
                window.location = ".";
            } else if (this.status == 400) {
                errorMsg = JSON.parse(this.response);
                document.getElementById('form-alert').innerHTML = "<pre>" + errorMsg + "</pre>";
                document.getElementById('form-alert').classList.add("show");
            } else {
                console.error(this.status + " when call " + URL);
                alert(this.status);
            }
        }
    };
    xhttp.open("POST", URL, true);
    xhttp.send(formData);
}