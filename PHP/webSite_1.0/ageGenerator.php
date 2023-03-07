<?php

 $xAge = rand(0,30);

// function getRandomAgeBelow30()
// {
//     return rand(0,29);
// }

// function getRandomAgeProvideLimits($minAge, $maxAge)
// {
//     return rand($minAge,$maxAge);
// }

function getRandomAgeOptionalLimits($minAge = 0, $maxAge = 110)
{
    return rand($minAge,$maxAge);
}

?> 