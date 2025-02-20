# Projet recette / vue

```php

<?php

class FrontController extends AbstractController{

    #[Route("/presentation" , name:"page_presentation")]
    public function home(){
        return $this->render("front/presentation.html.twig");
        // dans le dossier templates/front/presentation.html.twig
    }
}

```