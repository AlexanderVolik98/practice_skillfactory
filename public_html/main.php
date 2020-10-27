<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice </title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    
    <div class="flex-container">

        <div class="header">     
               <?php include 'logo.inc.php' ?>         
               <?php include 'menu.inc.php' ?>	   
        </div>       
     
        <div class="about_us">
          <h1>  <?php  echo $p  ?> </h1>
            <div class="data">
                <div class="myImg">
                    <?php  echo '<img src="/img/Ecorp.png">' ; ?>   
                </div>
            <div class="article">
                <p class="text">
                "There are some people out there… And it doesn’t happen a lot. It’s rare. But they refuse to
                 let you hate them. In fact, they care about you in spite of it. And the really special ones,
                  they’re relentless at it. Doesn’t matter what you do to them. They take it and care about you
                   anyway. They don’t abandon you, no matter how many reasons you give them. No ma
                tter how much you’re practically begging them to leave. And you wanna know why? Because they feel
                 something for me that I can’t… They love me."
                </p>
            </div>
        </div> 


    </div>


    <div class="fullname">
        <p> I learned how to output text to php </p>
                    <p> my_name:  
                    <?php echo $name, ' ', $surname . '<br>'; 
                          echo 'my city:', ' ', $city. '<br>' ;  
                          echo 'I am ', $age. ' years old', '<br>'; 
                          echo 'variable $name ', 'is an echo ',$type_1,' type', '<br>'; ?> 
                                       
                    </p> 
                   
                   
    </div>

    <div class="knowledge">
            
            <p> i learned simple number operations </p>
<p>
                    <?php  include 'knowledge.inc.php'; ?>
                  
                    <?php   echo $a, ' ', $b, ' ', $c; ?> <br>
                                       
                    <?php
                        $a = 10;
                        $b = 20;
                        $c = $a + $b;
                        echo $c;
                    ?>  
                                 
                     <?php echo $d; ?> 
                
                     </p>
                        
    </div>
            <?php include 'footer.inc.php' ?>
           
            

 


</body>
</html>
