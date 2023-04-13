<?php
include('header_tpl.php');
?>
<style>
    body{
        background-color:#3A5DAF;
    }
    #container_form{
        display:grid;
        margin-top: 10%;
        grid-template-rows : 20% 10% 50% 20%;
        grid-template-columns : 45% 10% 45%; 
    }
    h1{
        grid-row: 1;
        grid-column: 2;
        margin-top:20%;
        text-align: center;
        text-shadow: 2px 5px 3px #1A2D5F; 
        color: #C0BB05;
    }
    form{
        grid-row: 3;
        grid-column: 2;
    }
    label{
        font-size: 20px;
        margin-left: 5%;
        line-height: 30px;
        text-shadow: 2px 5px 3px #1A2D5F; 
        color: #C0BB05;
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
        margin-left:40%;
        padding:10px;
        background-color: #FFCB05;
        color:black;
        border: 2px solid #3A5DAF;
        border-radius: 5px;
        width: 60px;
        box-shadow: 1px 3px 8px #1A2D5F;
    }
    button:hover{
        background-color: #3A5DAF;
        border: 2px solid #FFCB05;
        color: #FFCB05;
        box-shadow: none;
    }
</style>
    <div id='container_form'>
        <h1>INSCRIPTION</h1>
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