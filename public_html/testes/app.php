<pre><?php

require "DTOAbstract.php";

$dto = new DTOAbstract();

// echo $dto->getNome(1,2);

echo $dto->getUrl();
echo "\n";
echo $dto->getTARGET();
echo "\n";
echo $dto->getOnclick();
echo "\n";
echo $dto->getName();
echo "<hr>";

echo $dto->get("url");
echo "\n";
echo $dto->get("target");
echo "\n";
echo $dto->get("onclick");
echo "\n";
echo $dto->get("name");
