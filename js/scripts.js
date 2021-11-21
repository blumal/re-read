function validar() {
    let mail = document.getElementById('email').value;
    let pwd = document.getElementById('password').value;
    if (mail == '' || pwd == '') {
        alert('Hay algún campo vacío');
        return false;
    } else {
        return true;
    }
}