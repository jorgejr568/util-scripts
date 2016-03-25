function successSweet(msg,confirm){
    confirm=confirm===undefined?'true':confirm;
            sweetAlertInitialize();
            swal({title: "",
                text: msg,
                showConfirmButton: confirm,
                html: true,
                type: 'success',
                confirmButtonClass: "btn-success",
                confirmButtonText: 'Fechar'});
}
function errorSweet(msg,confirm){
    confirm=confirm===undefined?'true':confirm;
sweetAlertInitialize();
            swal({title: "",
                text: msg,
                showConfirmButton: confirm,
                html: true,
                type: 'error',
                confirmButtonClass: "btn-danger",
                confirmButtonText: 'Fechar'});
}
function questionSweet(msg,confirm,functionToExec){
    confirm=confirm===undefined?'true':confirm;
    sweetAlertInitialize();
            swal({
                    title: "",
                    text: msg,
                    type: "warning",
                    showCancelButton: confirm,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Sim",
                    cancelButtonText: "Nao",
                    closeOnConfirm: false
                },
                function () {
                    var fnstring = functionToExec;
                    var fn = window[fnstring];
                    if (typeof fn === "function") fn();
                });
}
