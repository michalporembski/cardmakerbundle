<?php

namespace MPorembski\SampleModule\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StartController
{
    #[Route('/generate_card', name: 'card_maker_generate_card')]
    public function index(): Response
    {
        return new Response(
            'to do..'
        );
    }
}
