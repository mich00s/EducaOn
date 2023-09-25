<?php
$this->layout("_theme", ["categories"=>$categories]);
?>

<section class="registration">

    <div class="botao-voltar">
        <div>
            <a href="<?= url(""); ?>" class="botao-retornar"><img src="<?= url("assets/web/img/"); ?>voltar.png"><span>Voltar</span></a>
        </div>
    </div>

    <img class="wave-cadastro" src="<?= url("assets/web/img/"); ?>wave-cadastro.svg">

    <div class="container-cadastro">
        <section class="content-cadastro">
            <form id="formulario-cadastro" novalidate>
                <img class="avatar" src="<?= url("assets/web/img/"); ?>avatar-female.svg">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="field field_v2">
                            <input type="text"  value="" class="field__input" id="name" placeholder="Digite seu nome" autofocus="autofocus" name="name" autocomplete="off" required>
                            <span class="field__label-wrap">
									<span class="field__label">Nome Completo</span>
                            </span>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="field field_v2">
                            <input type="email"  class="field__input" id="email" placeholder="Digite seu e-mail" autofocus="autofocus" name="email" autocomplete="off" required>
                            <span class="field__label-wrap">
									<span class="field__label">E-mail</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="field field_v2">
                            <input type="text"  class="field__input" id="username" placeholder="Digite seu nome de usuário" autofocus="autofocus" name="username" autocomplete="off" required>
                            <span class="field__label-wrap">
									<span class="field__label">Username</span>
								</span>
                        </label>
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="field field_v2">
                            <input type="password"  class="field__input" id="password" placeholder="Digite sua senha" autofocus="autofocus" name="password" autocomplete="off" required>
                            <span class="field__label-wrap">
									<span class="field__label">Senha</span>
								</span>
                        </label>
                    </div>
                </div>

                <div id="message"> 

                </div>

                <button type="submit"  class="custom-btn btn-3 botao-cadastro">Cadastrar</button>
            </form>
            
        </section>
        <div class="imagem-cadastro">
            <img src="<?= url("assets/web/img/"); ?>undraw_my_app_re_gxtj.svg">
        </div>
        </section>
    </div>


    <script type="text/javascript" async>

        const message = document.querySelector("#message");

const url = `<?= url("api/user");?>`;

async function request (url, options) {
    try {
        const response = await fetch (url, options);
        const data = await response.json();
        return data;
    } catch (err) {
        console.error(err);
        return {
            type: "error",
            message: err.message
        };
    }
}
    const form = document.querySelector("form");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(document.querySelector("form"));

        const options = {
            method: "POST",
            body: formData
        };
        const user = await request(url, options);
        console.log(user);

            message.innerHTML = user.message;
            message.classList.add("message");
            message.classList.remove("success", "warning", "error");
            message.classList.add(`${user.type}`);
        
    });
</script>

