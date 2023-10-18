<?php
include('header_tpl.php');
?>

<body class='inscription_body'>
    <div id='container_inscription'>
        <h1 id='titre_inscription'>INSCRIPTION</h1>
        <form id="form_inscription" action="Signin/record" method="POST" onsubmit="return validateForm()">
            <label for='nom'>NOM</label>
            <input type="text" name='nom' id="inscription-nom" required>
            <label for='pseudo'>PSEUDO</label>
            <input type="text" name='pseudo' id="inscription-pseudo" required>
            <label for='email'>EMAIL</label>
            <input type="email" name='email' id="inscription-email" required>
            <label for='password'>MOT DE PASSE</label>
            <div class=input>
                <input type="password" name='password' id='password' required>
                <img src="views/assets/images/invisible.png" id="eye" onClick="closeEye()">
            </div>
            <label for='password'>CONFIRMATION MOT DE PASSE</label>
            <div class="input">
                <input type="password" name='password2' id='password2' required>
                <img src="views/assets/images/invisible.png" id="eye2" onClick="closeEye2()">
            </div>
            <div id="compare_container"></div><br>
            <button id="valid_inscription" type='submit'>OK</button>
        </form>
    </div>
    <script>
        let registerPass1 = document.getElementById("password");
        let registerEye1 = document.getElementById("eye");
        let registerPass2 = document.getElementById("password2");
        let registerEye2 = document.getElementById("eye2");
        let eyeCheck = true;
        let eyeCheck2 = true;

        function validateForm() {
            let champA = document.getElementById("password").value;
            let champB = document.getElementById("password2").value;
            let compare = document.getElementById("compare_container");

            if (champA !== champB) {
                compare.setAttribute('class', 'compare_box')
                compare.innerHTML = "Les Mots de passes ne correspondent pas !";
                return false;
            }
            return true;
            compare.removeAttribute('class')
        }

        function closeEye() {
            if (eyeCheck) {
                registerPass1.setAttribute("type", "text");
                registerEye1.src = "views/assets/images/visible.png";
                eyeCheck = false;
            }
            else {
                registerPass1.setAttribute("type", "password");
                registerEye1.src = "views/assets/images/invisible.png";
                eyeCheck = true;
            }
        }
        function closeEye2() {
            if (eyeCheck2) {
                registerPass2.setAttribute("type", "text");
                registerEye2.src = "views/assets/images/visible.png";
                eyeCheck2 = false;
            }
            else {
                registerPass2.setAttribute("type", "password");
                registerEye2.src = "views/assets/images/invisible.png";
                eyeCheck2 = true;
            }
        }
    </script>
    <?php
    include('footer_tpl.php');
    ?>