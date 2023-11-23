<?php
function addCategoryCondition($selectedCategories)
{
    if (!empty($selectedCategories)) {
        return "category_id IN (" . implode(',', $selectedCategories) . ")";
    }
    return "";
}

function addColorCondition($selectedColors)
{
    if (!empty($selectedColors)) {
        return "color_id IN (" . implode(',', $selectedColors) . ")";
    }
    return "";
}
function addBrandCondition($selectedBrands) {
    if (!empty($selectedBrands)) {
        return "brand_id IN (" . implode(',', $selectedBrands) . ")";
    }
    return "";
}

function addPriceCondition($selectedPriceRanges) {
    if (!empty($selectedPriceRanges)) {
        $priceConditions = [];
        foreach ($selectedPriceRanges as $range) {
            list($minPrice, $maxPrice) = explode('-', $range);
            $priceConditions[] = "(discounted_price >= $minPrice AND discounted_price <= $maxPrice)";
        }
        return "(" . implode(' OR ', $priceConditions) . ")";
    }
    return "";
}
// Trong đoạn mã trên, implode("','", $array) 
// được sử dụng để kết hợp các giá trị của mảng thành một chuỗi và IN được sử dụng để kiểm tra xem giá trị có thuộc danh sách đó hay không. 
// Đối với giá, nó chia thành các khoảng và sử dụng AND để kết hợp điều kiện.
