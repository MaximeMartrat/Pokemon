<?php
include('header_tpl.php');
?>

<body class='inscription_body'>
    <div id='container_inscription'>
        <h1 id='titre_inscription'>INSCRIPTION</h1>
        <form id="form_inscription" action="Signin/record" method="POST">
            <label for='nom'>Nom</label>
            <input type="text" name='nom' required>
            <label for='pseudo'>Pseudo</label>
            <input type="text" name='pseudo' required>
            <label for='email'>Email</label>
            <input type="email" name='email' required>
            <label for='password'>Mot de passe</label>
            <input type="password" name='password' required><br>
            <button id="valid_inscription" type='submit'>OK</button>
        </form>  
    </div>
<?php
include('footer_tpl.php');
?>