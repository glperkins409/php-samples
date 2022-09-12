<?php

$card = GenerateCardImage("HEARTS","KING");
echo $card . "\n";

/**
 * Generate a UTF8 encoded card character
 * @return string UTF8 encoded string
 * @author Gary Perkins
 * @license CC0 Public Domain
 */
function GenerateCardImage(string $suit, string $value) {
    // Find base card decimal value
    switch ($suit) {
        case "SPADES":
            $result = 127137;
            break;
        case "HEARTS":
            $result = 127153;
            break;
        case "DIAMONDS":
            $result = 127169;
            break;
        case "CLUBS":
            $result = 127185;
            break;
        default:
            // Derp
            die("Something went wrong in CardImage() assigning base card value");
    }
    // Add to base value depending on card value
    if (is_numeric($value)) {
        // Convert string-typed number to integer-typed value
        $result += (intval($value) - 1);
    } else {
        switch ($value) {
            case "JACK":
                $result += 11;
                break;
            case "QUEEN":
                $result += 12;
                break;
            case "KING":
                $result += 13;
                break;
            case "ACE":
                break;
            default:
                // Derp
                die("Something went wrong in CardImage() assigning final value");
        }
    }
    // Convert decimal result to multi-byte encoded character (UTF8)
    $result = mb_chr($result);
    if (!$result)
        die("Something went wrong in CardImage() converting decimal result to UTF8");
    return $result;
}
?>
