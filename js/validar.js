let form = document.querySelector(".formulario");
let validador = {
    validar: (event) => {
        $(".aviso-area").css("top", "-90px")
        event.preventDefault();
        let send = true;
        let inputs = document.querySelectorAll("input");
        inputs.forEach(element => {
            let checked = validador.check(element);
            if (checked != undefined) {
                send = false;
                validador.msg(checked);
            };
        });
        if (send) {
            let key = $(".btn").attr("key");
            ajax(key);
        }
    },

    check: (input) => {
        let rules = $(input).attr("rules");
        if (rules != undefined) {
            let rulesnew = rules.split(",");
            for (let i in rulesnew) {
                let rulesdetail = rulesnew[i].split("=");
                switch (rulesdetail[0]) {
                    case "required":
                        if (input.value.length == 0) {
                            return "Campo Vazio!";
                        }
                        break;
                    case "min":
                        if (input.value.length < rulesdetail[1]) {
                            return "Caracteres Insuficientes!!";
                        }
                        break;
                    case "max":
                        if (input.value.length > rulesdetail[1]) {
                            return "Muito grande!! máximo " + rulesdetail[1];
                        }
                        break;
                }
            }
        };
    },

    msg: (msg) => {
        $(".aviso-area").html(msg + "<span onclick='closeIt()' class='aviso-x'>X</span>");
        $(".aviso-area").css("top", "15px");
    }

}

let closeIt = () => {
    $(".aviso-area").css("top", "-90px")
};

let ajax = (index) => {
    let obj = {};
    let url = "";

    if (index == 1) {
        url = "syssl.php?req=1";
        obj = {
            Email: $("#textEmail").val(),
            Senha: $("#textPassword").val()
        }
    } else {
        obj = {
            Nome: $("#textNome").val(),
            Email: $("#textEmail").val(),
            Senha: $("#textPassword").val()
        }
        url = "syssl.php?req=2";
    }
    $.ajax({
        url: url,
        type: "POST",
        data: obj,
        dataType: "html",
        success: (data) => {
            switch (data) {
                case "1":
                    window.location.href = "painel.php";
                    break;
                case "-1":
                    validador.msg("Dados Inválidos!!");
                    break;
                case "2":
                    window.location.href = "painel.php";
                    break;
                case "-2":
                    validador.msg("já existe");
                    break;
            }
        }
    });
}


$(form).submit(validador.validar);