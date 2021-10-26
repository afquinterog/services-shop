<?php

namespace App\Services;

class Style
{
    const STYLES = [
        'light' => [
            'background' => 'bg-gray-100',
            'button-background-color' =>  'bg-blue-500',
            'button-background-hover-color' => 'bg-blue-600',
            'modal-background-color' => 'bg-gray-700',
            'primary-text' => 'text-gray-900',
            'category-title-color' => 'text-blue-500',
            'search-bar-background-color' => 'bg-white-200',
            'search-bar-results-background-color' => 'bg-gray-500',
            'product-price-circle-background-color' => 'bg-gray-300',
            'social-networks-circle-background-color' => 'bg-gray-400',
            'social-networks-circle-hover-color' => 'text-gray-600',
        ],
        'dark' => [
            'background' => 'bg-gray-900',
            'button-background-color' =>  'bg-blue-500',
            'button-background-hover-color' => 'bg-blue-600',
            'modal-background-color' => 'bg-gray-900',
            'primary-text' => 'text-green-200',
            'category-title-color' => 'text-blue-500',
            'search-bar-background-color' => 'bg-gray-800',
            'search-bar-results-background-color' => 'bg-gray-800',
            'product-price-circle-background-color' => 'bg-gray-800',
            'social-networks-circle-background-color' => 'bg-gray-400',
            'social-networks-circle-hover-color' => 'bg-gray-600',
        ],
    ];

    public function getBackground()
    {
        return Style::STYLES[session('theme', 'light')]['background'];;
    }

    public function getText()
    {
        return Style::STYLES[session('theme', 'light')]['primary-text'];
    }

    public function getCategoryTitleColor()
    {
        return Style::STYLES[session('theme', 'light')]['category-title-color'];
    }

    public function getSearchBarBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['search-bar-background-color'];
    }

    public function getSearchBarResultsBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['search-bar-results-background-color'];
    }

    public function getProductPriceCircleBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['product-price-circle-background-color'];
    }

    public function getSocialNetworksCircleBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['social-networks-circle-background-color'];
    }

    public function getSocialNetworksCircleHoverColor()
    {
        return Style::STYLES[session('theme', 'light')]['social-networks-circle-hover-color'];
    }

    public function getButtonBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['button-background-color'];
    }

    public function getButtonBackgroundHoverColor()
    {
        return Style::STYLES[session('theme', 'light')]['button-background-hover-color'];
    }

    public function getModalBackgroundColor()
    {
        return Style::STYLES[session('theme', 'light')]['modal-background-color'];
    }


}
