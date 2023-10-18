<style>
    body {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        width: 100vw;
        z-index: -1;
        background-image: url('../views/assets/images/winner.gif');
        background-size: cover;
        overflow: hidden;
    }

    div {
        margin-top: 10%;
    }

    button {
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        margin-left: 40%;
        padding: 10px;
        background-color: #FFCB05;
        color: black;
        border: 2px solid #3A5DAF;
        border-radius: 5px;
        width: 100px;
        box-shadow: 1px 3px 8px #1A2D5F;
        transition: background-color 0.3s, color 0.3s, border 0.3s, box-shadow 0.3s;
    }

    button:hover {
        background-color: #3A5DAF;
        border: 2px solid #FFCB05;
        color: #FFCB05;
        box-shadow: none;
    }

    h1 {
        margin-top: 10%;
        grid-row: 1;
        grid-column: 2;
        text-align: center;
        text-shadow: 2px 4px 3px #FFCB05;
        color: #3A5DAF;
    }
</style>
<div>
    <h1>
        <?php echo strtoupper($pseudo); ?> BIENVENU DANS L'ARENE !
    </h1>
    <button onclick="redirection()">Accueil</button>
</div>
<script>
    function redirection() {
        window.location.href = "/";
    }
</script>