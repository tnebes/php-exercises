<!--
    Author: tnebes
    16 June 2021
    Page 101
-->

<!-- 
    Asks users for length, width and height of a room
    Input will be sent to exercise01.php

    Calculate the cost of paint, cost of labour, total cost based on:

    gallon of paint: $17.00 (for 400 square feet)
    labour: $25 per hour for 200 square feet

    Program must output the length, width, height and total area of the room, followed by paint cost, labour cost and total cost.

 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Here is our offer:</h1>

    <?php
    
    //declare(strict_types=1);

    $length = $_POST['roomLength'];
    $width = $_POST['roomWidth'];
    $heigth = $_POST['roomHeight'];
    $paintCost = 17.00;
    $nominalPaintSize = 400;
    $labourCost = 25;
    $labourNominalArea = 200;


    function calculateWallArea(float $sideA, float $sideB) : float
    {
        return $sideA * $sideB;
    }

    function getWallAreaA() : float
    {
        global $length, $heigth;
        return calculateWallArea($length, $heigth);
    }

    function getWallAreaB() : float
    {
        global $width, $heigth;
        return calculateWallArea($width, $heigth);
    }

    function getTotalPaintingArea() : float
    {
        return getWallAreaA() * 2 + getWallAreaB() * 2;
    }

    function getRoomArea() : float
    {
        global $width, $length;
        return $width * $length;
    }

    function getPaintCost() : float
    {
        global $nominalPaintSize, $paintCost;
        $paintUnitsNeeded = ceil(getTotalPaintingArea() / $nominalPaintSize);
        if ($paintUnitsNeeded <= 1) {
            return $paintCost;
        }
        return $paintUnitsNeeded * $paintCost;
    }

    function getLabourCost() : float
    {
        global $labourNominalArea, $labourCost;
        $labourQuantity = ceil(getTotalPaintingArea() / $labourNominalArea);
        if ($labourQuantity <= 1) {
            return $labourCost;
        }
        return $labourQuantity * $labourCost;
    }

    function getTotalCost() : float
    {
        return getPaintCost() + getLabourCost();
    }

    print("<p>");
    print("For your wonderful room with the lenght of $length, width of $width and height of $heigth<br/>");
    printf("Whose total area is %.2f <br/>", getRoomArea());
    printf("The paint cost is $%.2f <br/>", getPaintCost());
    printf("The labour cost is $%.2f <br/>", getLabourCost());
    printf("Thus the total cost would be $%.2f ", getTotalCost());
    print("</p>");

    ?>

</body>

</html>