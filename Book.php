<?php

class Book {

  # Propiedades = características de un objeto

  # Metodos = acciones/funciones de un objeto
  public function __construct(
    private string $author,
    private string $title,
    private float $price,
    private int $stock,
    private int $id
  )
  {}

  public function getInfo() {
      $info = "<b> {$this->title} </b> escrito por <i> $this->author </i> <br>
      Precio: {$this->price} <br>
      ID: {$this->id} <br>";

      if ($this->stock > 0) {
        $info .= "Stock disponible: <span style='color:green'> {$this->stock} unidades <br> </span>";
      } else{
        $info .= "Stock disponible: <span style='color:red'> Sin existencias <br> </span>";
      }
      # El signo .= concatena el string a la variable $info
      return $info;
    }
}

# Instancia de la clase que por debajo ejecuta el constructor
$book1 = new Book("J.K. Rowling", "Harry Potter y el Caliz de Fuego", 199.90, 100, 1);
$book2 = new Book("Timothy Zahn", "Star Wars: Heredero del Imperio", 159.90, 100, 2);
# var_dump($book1);

/* Acceder a propiedades
echo $book1->title;
echo "<br>";
echo $book1->author;
*/

echo $book1->getInfo();
echo "<br>";
echo $book2->getInfo();

?>