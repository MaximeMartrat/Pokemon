<?php
include('header_tpl.php');
?>
<style>
    .inscription_body{
    background-color:#3A5DAF;
    font-family: 'Poppins', sans-serif;
}
#container_inscription{
    display:grid;
    margin-top: 10%;
    grid-template-rows : 20% 10% 50% 20%;
    grid-template-columns : 45% 10% 45%; 
}
#titre_inscription{
    grid-row: 1;
    grid-column: 2;
    margin-top:20%;
    text-align: center;
    text-shadow: 2px 5px 3px #1A2D5F; 
    color: #C0BB05;
}
#form_inscription{
    grid-row: 3;
    grid-column: 2;
}
#form_inscription label{
    font-size: 20px;
    margin-left: 5%;
    line-height: 30px;
    text-shadow: 2px 5px 3px #1A2D5F; 
    color: #C0BB05;
}
#form_inscription input {
    
    display: block;
    border-radius: 5px;
    height:30px;
    width: 200px;
    border:1px solid #3A5DAF;
}
#form_inscription input:focus {
    outline:  none;
}
#valid_inscription{
    margin-left:40%;
    padding:10px;
    background-color: #FFCB05;
    color:black;
    border: 2px solid #3A5DAF;
    border-radius: 5px;
    width: 60px;
    box-shadow: 1px 3px 8px #1A2D5F;
}
#valid_inscription:hover{
    background-color: #3A5DAF;
    border: 2px solid #FFCB05;
    color: #FFCB05;
    box-shadow: none;
}
</style>
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