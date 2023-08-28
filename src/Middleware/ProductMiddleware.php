<?php

namespace AlbuquerqueLucas\PhpTestRouting\Middleware;

class ProductMiddleware {
    public function validate() {
        $title = filter_input(INPUT_POST, 'product-title', FILTER_SANITIZE_STRING);
        if ($title === '') {
            $title = null;
        }
        $description = filter_input(INPUT_POST, 'product-description', FILTER_SANITIZE_STRING);
        $price = floatval(filter_input(INPUT_POST, 'product-price', FILTER_DEFAULT));
        $categoryId = filter_input(INPUT_POST, 'product-category', FILTER_DEFAULT);
        $urlImage = "https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg";
        
        return [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'category-id' => $categoryId,
            'url-image' => $urlImage,
        ];
    }
}
