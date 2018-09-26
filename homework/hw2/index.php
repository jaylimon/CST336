<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("css/styles.css");
        </style>
        <title>Train Facts</title>
    </head>
    <header>
        <h1>Train Facts for James<h1>
        </header>
    </br>
    </br>
    <body>

        <div id= "main">
        <?php
            include 'inc/function.php';
            displayTrain();
            
        ?>  
        </br>
        </div>
        <div id= "cho">
            <form>
                <input type= "submit" value= "Choo! Choo!"/>
            </form>
        </div>
        <audio autoplay>
            <source src="audio/horn.mp3" type="audio/mpeg">
        </audio>
    </body>
        <footer id= "game">
            <hr size= 3% background-color:red>
            <small> Roll more than a 9 to cross the rail </small>
            </br>
            <img src= "img/rails.png" width="80" height= "20">
            <img src= "img/train.png" width="90" height= "40">
            <?php
                play();
            ?>
        </footer>
</html>