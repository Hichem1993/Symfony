# Création controller :

src/Controller/PhraseController.php


```php

use ...
namespace App\Controller;
class PhraseController extends AbstractController{
    #[Route("/" , name:"page_exemple")]
    public function exemple(){
        return new Response("Bonjour");
        return this->render("front/exemple.html.twig");
    }
}

```


# Création Page Vue : .html.twig

Template/front/exemple.html.twig
===> page HTML