<?php
$books = [
  [
    'title' => "The Catcher in the Rye",
    'author' => "J.D. Salinger",
    'release date' => 1951
  ],
  [
    'title' => "To Kill a Mockingbird",
    'author' => "Harper Lee",
    'release date' => 1960
  ],
  [
    'title' => "1984",
    'author' => "George Orwell",
    'release date' => 1949
  ],
  [
    'title' => "Pride and Prejudice",
    'author' => "Jane Austen",
    'release date' => 1813
  ]
];

$filteredBooks = array_filter($books, fn($book) => $book["release date"] <= 1950);

view('home.view.php', ['heading' => 'Home Pagex']);
