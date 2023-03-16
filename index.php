<?php

require_once 'src/FakeInfo.php';

for ($index = 0; $index < 20; $index++) {
    unset($fakeInfo);
    $fakeInfo = new FakeInfo;
    show($fakeInfo->getCpr());
    show($fakeInfo->getFullNameAndGender());
}

function show(string|array $text): void {
    if (gettype($text) === 'string') {
        echo $text . '<br>';
    } else {
        echo '<pre>';
        print_r($text);
    }
}