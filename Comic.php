<?php

require 'Book.php'; # O con composer y autoload y namespaces y use
class Comic extends Book {

  public function __construct(private string $author,
  private string $title,
  private float $price,
  private int $stock,
  private int $id,
  private array $ilustrators,
  private int $volums ) # Se pasan todos los parametros del constructor de la clase padre
  {
    parent::__construct($author, $title, $price, $stock, $id);
    # Para llamar al constructor de la clase padre para importar las propiedades de la clase padre
  }

  # Sobreescritura de metodos 
  public function getInfo() {

    $result = "Volumen: {$this->volums}";

    $ul = "<ul> -- Ilustradores --";

    foreach ($this->ilustrators as $ilustrator) {
      $ul .= "<li> $ilustrator </li>";
    }

    $ul .= "</ul>"; # Esto porque el foreach no puede cerrar la etiqueta ul

    echo parent::getInfo(); # Para llamar al metodo de la clase padre con su codigo y funcionalidad

    return $result .= $ul; # Concatenar el resultado de la clase padre con el resultado de la clase hija
  }
}

$comic1 = new Comic("Alan Moore", "Watchmen", 299.90, 100, 1, ["Dave Gibbons"], 1);

echo "<br>";
echo $comic1->getInfo();
?>