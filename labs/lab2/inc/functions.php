<?php
function displaySymbol($ran_v, $pos){
            
            switch($ran_v)
            {
                case 0: $symbol= 'seven';
                    break;
                case 1: $symbol= 'cherry';
                    break;
                case 2: $symbol= 'orange';
                    break;  
                case 3: $symbol= 'grapes';
                    break;                  
            }
            echo "<img id= 'reel$pos' src=\"img/$symbol.png\" alt='$symbol' title='" .ucfirst($symbol)."'/>";
        }//display symbol
        
function displayPoints($ran_1, $ran_2, $ran_3, $ran_4)
        {
            echo "<div id= 'output'>";
            if($ran_1 == $ran_2 && $ran_2 == $ran_3  ){
                switch ($ran_1)
                {
                    case 0: $points= 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                    case 1: $points= 500;
                        break;
                    case 2: $points= 250;
                        break;
                    case 3: $points= 900;
                        break;                      
                }
                echo "<h2> You won $points points!</h2>";
            } else{
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";
        }
function play(){
    for ($i=1; $i<4; $i++)
    {
        ${"randomValue" . $i}= rand(0,3);
        displaySymbol(${"randomValue" . $i}, $i);
    }
    displayPoints($randomValue1, $randomValue2, $randomValue3, $randomValue4);
}
?>