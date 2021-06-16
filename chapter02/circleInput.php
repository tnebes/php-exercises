<!--
    tnebes
    16 June
    
 -->

 <html>
    <head>
        <title>My first PHP Example</title>
    </head>
    <body>
        <h1>Calculating the area and circumference of a circle</h1>
        <h2>Based on the radius of the circle.</h2>
        <?php
            $radius = $_POST['radius'];
            $area = pi() * pow($radius, 2);
            $circumference = 2 * pi() * $radius;

            print("<p>A circle with the radius $radius has an area of $area and a circumference of $circumference</p>");
            print("<p><a href=\"circle.html\">Calculate another circle?</a></p>")
        ?>
    </body>
 </html>