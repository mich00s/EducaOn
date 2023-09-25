<?php
$this->layout("_theme", ["categories"=>$categories]);
?>
<!--==================================
=            LOGIN            =
===================================-->

<div class="botao-voltar">
    <div>
        <a href="<?= url(""); ?>" class="botao-retornar"><img src="<?= url("assets/web/img/"); ?>voltar.png"><span>Voltar</span></a>
    </div>
</div>

<img class="wave-login" src="<?= url("assets/web/img/"); ?>wave-login.svg">
<div class="container-login">
    <div class="imagem-login">
        <img src="<?= url("assets/web/img/"); ?>undraw_Emails_re_cqen.svg">
    </div>
    <div class="login">
        <form id="formulario-login">
            <img class="avatar" src="<?= url("assets/web/img/"); ?>avatar-male.svg">
            <h2>Welcome</h2>

            <div class="input-login">
                <label class="field field_v2">
                    <input type="email" value="" class="field__input" id="email" placeholder="Digite seu email" autofocus="autofocus" name="email" value="fabio@gmail.com" autocomplete="off" required>
                    <span class="field__label-wrap">
							<span class="field__label">Email</span>
						</span>
                </label>
            </div>
            <div class="input-login">
                <label class="field field_v2">
                    <input type="password" value="" class="field__input" id="password" placeholder="Digite sua senha" autofocus="autofocus" name="password" value="2353543" autocomplete="off" required>
                    <span class="field__label-wrap">
							<span class="field__label">Senha</span>
						</span>
                </label>
            </div>
            <div id="message">
                </div>
            <button type="submit" class="custom-btn btn-3 botao-login"><span>Login</span></button>
            <h5 class="cadastrar-login">Não tem uma conta?<a href="<?= url("registrar"); ?>" class="cadastrar-login"> Cadastre-se</a></h5>

            
            
        </form>
    </div>
</div>

<script type="text/javascript" async>
    const message = document.querySelector("#message");

    const url = `<?= url("api/user/login");?>`;

    async function request (url, options) {
        try {
            const response = await fetch (url, options);
            const data = await response.json();
            return data;
        } catch (err) {
            message.error(err);
           
            return {
                type: "error",
                message: err.message
            };

        }
    }

    document.querySelector("form").addEventListener("submit", async (e) => {
        e.preventDefault();

        
        const formData = new FormData(document.querySelector("form"));
        const options = {
            method: 'POST',
            body : formData
        };
        const resp = await request(url, options);
        console.log(resp);

        message.innerHTML = resp.message;
            message.classList.add("message");
            message.classList.remove("success", "warning", "error");
            message.classList.add(`${resp.type}`);
        
    });

  /*  const form = document.querySelector("#formulario-login");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("login"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        //console.log(user);
        if(user) {
            if(user.type === "success"){
                window.location.href = "http://www.localhost/fullcode.com/app";
            } else {
                console.log(user);
                message.innerHTML = user.message;
                message.classList.add("message");
                message.classList.remove("success", "warning", "error");
                message.classList.add(`${user.type}`);
            }
        }
    });*/
</script>