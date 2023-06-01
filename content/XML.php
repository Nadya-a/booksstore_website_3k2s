<?php header("Contenr-type: text/xml");
print "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";

$servername = "localhost";
$database = "booksstore";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Соединение провалено по причине: " . mysqli_connect_error());
}
echo "";



$strSQL1="SELECT * FROM publishment ORDER BY Publishment_id";
$result1=mysqli_query($conn, $strSQL1) or die ("Не могу выполнить запрос");

print "<Список_книг_из_каталога>";
while ($row=mysqli_fetch_array($result1)){
    print "<Издательство
    код='".$row["Publishment_id"]."'>".$row["Publishment_name"];

    $strSQL2 = "SELECT Book_name, Book_type, Book_price, Book_genre, book.Author_id, author.Author_id,Author_name  
FROM book, author WHERE book.Author_id=author.Author_id and book.Publishment_id=".$row["Publishment_id"];
    $result2=mysqli_query($conn, $strSQL2) or die ("Не могу выполнить запрос");

    while ($row2=mysqli_fetch_array($result2)){
        print "<Книга имя='".$row2["Book_name"]."'>";
        print "<Тип>".$row2["Book_type"]."</Тип>";
        print "<Цена>".$row2["Book_price"]."</Цена>";
        print "<Автор>".$row2["Author_name"]."</Автор>";
        print "</Книга>";
    }
    print "</Издательство>";
}
print "</Список_книг_из_каталога>";

?>
