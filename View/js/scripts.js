// Cadastro de Contato
function cadastrarContato() {
    dados = {
        'id': $('#id').val(),
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'cadastrar': $('#cadastrar').val()
    };

    carregarModalLoading(); // Mostra o Loading

    $.ajax({
        url: '../Controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {
            setTimeout(function () {
                esconderModalLoading();
                $('#status').text(data.mensagem); // Mostra a mensagem

                // Verifica o código retornado
                if (data.codigo == 1) {
                    $('#status').css({
                        "color": "#49a300"
                    });
                    // Redireciona para o index depois do Delay
                    setTimeout(function () {
                        window.location.href = "cadastro.php";
                    }, 2000); // Tempo em milissegundos

                } else {
                    $(data.campo).focus();
                    $('#status').css({
                        "color": "#ff6f65"
                    });
                }
            }, 1000); // Tempo em milissegundos
        }
    });
}

// Login
function efetuarLogin() {
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'login': $('#login').val()
    };

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../Controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {
            // Mostra a mensagem
            $('#status').text(data.mensagem);

            // Verifica o código retornado
            if (data.codigo == 1) {
                $('#status').css({
                    "color": "#f1c40f"
                });
                // Redireciona para o index depois do Delay
                setTimeout(function () {
                    window.location.href = "home.php";
                }, 2000); // Tempo em milissegundos

            } else {
                $(data.campo).focus();
                $('#status').css({
                    "color": "#ff6f65"
                });
                setTimeout(function () {
                    esconderModalLoading();
                }, 2000); // Tempo em milissegundos
            }
        }
    });
}

// Logout
function efetuarLogout() {
    dados = {
        'logout': $('#logout').val()
    }

    // Mostra o Loading
    carregarModalLoading();

    $.ajax({
        url: '../Controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function () {
            // Redireciona para o index depois do Delay
            setTimeout(function () {
                window.location.href = "home.php"
            }, 2000); // Tempo em milissegundos
        }
    });
}


function excluirContato() {
    dados = {
        'id': $('#id').val(),
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'excluir': $('#excluir').val()
    };

    carregarModalLoading(); // Mostra o Loading

    $.ajax({
        url: '../Controller/contatoController.php',
        type: 'POST',
        data: dados,
        success: function (data) {
            setTimeout(function () {
                esconderModalLoading();
                $('#status').text(data.mensagem); // Mostra a mensagem

                // Verifica o código retornado
                if (data.codigo == 1) {
                    $('#status').css({
                        "color": "#49a300"
                    });
                    // Redireciona para o index depois do Delay
                    setTimeout(function () {
                        window.location.href = "home.php";
                    }, 2000); // Tempo em milissegundos

                } else {
                    $(data.campo).focus();
                    $('#status').css({
                        "color": "#ff6f65"
                    });
                }
            }, 1000); // Tempo em milissegundos
        }
    });
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    });
}

function esconderModalLoading() {
    $('#modalLoading').css({
        "display": "none"
    });
}
