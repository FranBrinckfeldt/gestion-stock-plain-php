function getElement(tagName) {
    return document.querySelector(tagName);
}

function isEmpty(input) {
    return input.value.trim().length === 0
}

function checkRequired(input, label) {
    if (isEmpty(input)) {
        alert("El campo " + label + " es requerido");
        input.focus;
        return false;
    }
    return true;
}

function validateLogin() {
    var emailInput = getElement("#email");
    var passwordInput = getElement("#password");
    return checkRequired(emailInput, 'Email') &&
        checkRequired(passwordInput, 'Contraseña');
}

function validateRegister() {
    var emailInput = getElement("#email");
    var passwordInput = getElement("#password");
    var firstnameInput = getElement("#firstname");
    var lastnameInput = getElement("#lastname");
    return (
        checkRequired(firstnameInput, 'Nombre') &&
        checkRequired(lastnameInput, 'Apellido') &&
        checkRequired(emailInput, 'Email') &&
        checkRequired(passwordInput, 'Contraseña')
    );
}

function validateCreateProduct() {
    var codeInput = getElement("#code");
    var nameInput = getElement("#name");
    var categoryInput = getElement("#category");
    var subsidiaryInput1 = getElement("#subsidiary1");
    var qtyInput = getElement("#qty");
    var priceInput = getElement("#price");

    return checkRequired(codeInput, 'Código') &&
        checkRequired(nameInput, 'Nombre') &&
        checkRequired(categoryInput, 'Category') &&
        checkRequired(subsidiaryInput1, 'Sucursal 1') &&
        checkRequired(qtyInput, 'Cantidad') &&
        checkRequired(priceInput, 'Precio')
}