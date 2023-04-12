<?php
include('header_tpl.php');
?>
    <div id='container_form'>
        <form action="Signin/record" method="POST">
            <label for='nom'>Nom</label>
            <input type="text" name='nom'>
            <label for='pseudo'>Pseudo</label>
            <input type="text" name='pseudo'>
            <label for='email'>Email</label>
            <input type="email" name='email'>
            <label for='password'>Mot de passe</label>
            <input type="password" name='password'><br>
            <button type='submit'>OK</button>
        </form>  
    </div>
<?php
include('footer_tpl.php');
?>