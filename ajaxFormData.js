var formData = new FormData($('[name=formCadastrarLivro]')[0]);
    $.ajax({
        url: origin.siteURL+'controller/cadastrar.livro',
        type: 'POST',
        data: formData,

        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            myXhr.upload;
            return myXhr;
        },
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        if(data.success==true){
            successSweet(data.msg);
        }
        else{
            errorSweet(data.msg);
        }
    });
