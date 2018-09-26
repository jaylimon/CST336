<?php

function displayTrain(){
            
    $train= array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg','8.jpg',);
    shuffle($train);
    $steam= 0;
    $freight=0;
    $diesel= 0;
        for($i=0; $i<2; $i++) { 
            echo "<li style=\"display:inline;\"><img src=\"img/$train[$i]\" width=\"300\" height=\"300\"></li>";
                if ($train[$i] == '1.jpg' or $train[$i] == '2.jpg' or $train[$i] == '3.jpg')
                    $diesel+=1;
                if ($train[$i] == '4.jpg' or $train[$i] == '5.jpg' or $train[$i] == '6.jpg')
                    $freight+=1;
                if ($train[$i] == '7.jpg' or $train[$i] == '8.jpg' or $train[$i] == '9.jpg')
                    $steam+=1;   
        }
        echo "</br>";
        echo "<div id='fact'>";
            if($steam>= 1)
                steamFacts();
            if($freight>= 1)
                freightFacts();
            if($diesel>= 1)
                dieselFacts();
            
        echo "</div>";

}
function steamFacts() {
    $a=array("Thomas Savery built the first steam engine in 1698. ", 
    "The fastest steam train was the A4 'Mallard' 4-6-2 and could reach 125 or 126 mph.", 
    "Steam trains were first built (in the early 1800s) to carry goods and materials.", 
    "The 4-8-8-4 Union Pacific Big Boys were the largest steam train ever built.", 
    "Steam trains get their power by burning coal in a firebox.", 
    "It takes about three hours for the crew to get up enough steam to get a locomotive moving.",
    "James loves Steam Trains.");
    
    $ranFacts=array_rand($a,2);
    echo "Steam Train: " . $a[$ranFacts[0]]."<br>";
    echo "Steam Train: " . $a[$ranFacts[1]]."<br>";

  
}
function freightFacts() {
    $a=array("The longest freight train in American history was longer than 60 football fields.",
    "Freight rail is the leading form of transportation for shipments traveling 750 to 2,000 miles","473 miles: 
    How far a freight train can move a ton of freight on one gallon of fuel", "Rail freight accounts for 16% of 
    U.S. freight shipments by weight", "Freight trains weigh anywhere from 1,500 
    tons to 6,000 tons or more", "Longest freight train is 170 miles.", "The longest freight train ever 
    had 660 wagons and was pulled by 16 diesel engines.");
    $ranFacts=array_rand($a,2);
    echo "Freight Train Fact: " . $a[$ranFacts[0]]."<br>";
    echo "Freight Train Fact: " . $a[$ranFacts[1]]."<br>";
}
function dieselFacts() {
    $a=array("Diesel locomotives are made up from one or more separate units",
    "The diesel engine was invented by Rudolf Diesel in 1892 and experiments 
    with diesel trains started soon after", "From the 1930s, diesel locomotives 
    started to replace steam engines.", "Diesel powered trains are used worldwide",
    "Diesel and electric trains started slowly replacing steam trains in 1950s");
    $ranFacts=array_rand($a,2);
    echo "Diesel Train Fact: " . $a[$ranFacts[0]]."<br>";
    echo "Diesel Train Fact: " . $a[$ranFacts[1]]."<br>";
}
function displayDice($ran_v){
            
            switch($ran_v)
            {
                case 0: $dice= 'one';
                    break;
                case 1: $dice= 'two';
                    break;
                case 2: $dice= 'three';
                    break;  
                case 3: $dice= 'four';
                    break; 
                case 4: $dice= 'five';
                    break;
                case 5: $dice= 'six';
                    break;  
            }
            echo "<li style=\"display:inline;\"><img src=\"img/$dice.png\" width=\"12\" 
            height=\"12\" hspace=\"5\"></li>";
        }//display symbol
function play(){
    for ($i=1; $i<2; $i++)
    {
        ${"ranv" . $i}= rand(0,5);
        displayDice(${"ranv" . $i});
        ${"ran_v" . $i}= rand(0,5);
        echo ${"ranv_v" . $i};
        displayDice(${"ran_v" . $i});
        if (${"ran_v" . $i}+ ${"ranv" . $i} >=8)
            echo "<small> <br>Congrats, you made it over the rail!</small>";
        else 
            echo "<small> <br> Sorry, try agin. You must roll a total of 9!</small>";
    }

    
}

?>