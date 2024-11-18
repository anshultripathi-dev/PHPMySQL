<html>
<head>
    <title>Question: 2</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="text" name="text" placeholder="Enter text">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
function countWords($str)
{
    $words = str_word_count($str, 2);
    $wordCounts = array_count_values($words);

    arsort($wordCounts);

    $wordData = [];
    foreach ($words as $position => $word) {
        if (!isset($wordData[$word])) {
            $wordData[$word] = [
                'count' => $wordCounts[$word],
                'position' => $position + 1, 
                'length' => strlen($word)
            ];
        }
    }
    return $wordData;
}

if (isset($_GET['text']) && !empty($_GET['text'])) {
    $inputText = $_GET['text'];
    $wordData = countWords($inputText);

    uasort($wordData, function ($a, $b) {
        return $b['count'] <=> $a['count'];
    });

    echo "<b>Entered string:</b> $inputText<br><br>";
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>Word</th><th>Count</th><th>Position</th><th>Length</th></tr>";
    foreach ($wordData as $word => $data) {
        echo "<tr>";
        echo "<td>$word</td>";
        echo "<td>{$data['count']}</td>";
        echo "<td>{$data['position']}</td>";
        echo "<td>{$data['length']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
