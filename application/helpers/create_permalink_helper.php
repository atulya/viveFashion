<?php

function createPermaLink($productName) {
    return strtolower(str_replace(' ', '-', $productName));
}
