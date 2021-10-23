<?php

namespace App\Services;

class Style
{
    const STYLES = [
        'light' => [
            'background' => 'bg-gray-100',
            'primary-text' => 'text-gray-900',
            'category-title-color' => 'text-blue-500',
            'search-bar-background-color' => 'bg-white-200',
            'search-bar-results-background-color' => 'bg-gray-500',
        ],
        'dark' => [
            'background' => 'bg-gray-900',
            'primary-text' => 'text-green-200',
            'category-title-color' => 'text-blue-500',
            'search-bar-background-color' => 'bg-gray-800',
            'search-bar-results-background-color' => 'bg-gray-800',
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
}
