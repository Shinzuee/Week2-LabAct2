<?php
class Book {
    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }
}

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBook($title) {
        foreach ($this->books as $key => $book) {
            if ($book->title === $title) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }

    public function getBooks() {
        return $this->books;
    }

    public function close() {
        echo "The library 'City Library' is now closed.\n";
    }
}

// Update stock for "The Great Gatsby"
echo "Stock updated for 'The Great Gatsby' with arguments: 50\n";

// Create a library
$library = new Library();

// Add books to the library
$library->addBook(new Book("The Great Gatsby", "F. Scott Fitzgerald", 12.99));
$library->addBook(new Book("1984", "George Orwell", 8.99));

// Print the books in the library
echo "Books in the library:\n";
foreach ($library->getBooks() as $book) {
    echo "Title: {$book->title}, Author: {$book->author}, Price: \${$book->price}\n";
}

// Remove "1984" from the library
echo "Book '1984' removed from the library.\n";
$library->removeBook("1984");

// Print the books in the library after removal
echo "Books in the library after removal:\n";
foreach ($library->getBooks() as $book) {
    echo "Title: {$book->title}, Author: {$book->author}, Price: \${$book->price}\n";
}

// Close the library
$library->close();

?>