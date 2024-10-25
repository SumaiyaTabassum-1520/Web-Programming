<?php
function jaccardSimilarity($set1, $set2) {
    $intersection = array_intersect($set1, $set2);
    $union = array_unique(array_merge($set1, $set2));

    $jaccardSimilarity = count($intersection) / count($union);
    return $jaccardSimilarity;
}

$content1 = file_get_contents('file1.txt');
$words1 = str_word_count(strtolower($content1), 1);

$content2 = file_get_contents('file2.txt');
$words2 = str_word_count(strtolower($content2), 1);

$similarity = jaccardSimilarity($words1, $words2);

echo "Jaccard Similarity: " . ($similarity * 100) . "%\n";
?>
