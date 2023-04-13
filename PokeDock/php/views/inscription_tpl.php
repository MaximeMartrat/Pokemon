<?php
include('header_tpl.php');
?>
<style>
    body{
        background-color:#3A5DAF;
    }
    #container_form{
        display:flex;
        justify-content: center;
        margin-top: 10%;
    }
    h1{
        text-align: center;
    }
    form input {
        display: block;
        border-radius: 5px;
        height:30px;
        width: 200px;
        border:1px solid #3A5DAF;
    }
    form input:focus {
        outline:  none;
    }
    button{
        margin-left:35%;
        padding:10px;
        background-color: #FFCB05;
        color:black;
        border: 2px solid #3A5DAF;
        border-radius: 5px;
        width: 60px;
    }
    button:hover{
        background-color: #3A5DAF;
        border: 2px solid #FFCB05;
        color: #FFCB05;
    }
</style>
    <h1>INSCRIPTION</h1>
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