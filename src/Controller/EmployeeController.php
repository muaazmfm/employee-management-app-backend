<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employees',
        name: 'get employees',
        methods: ['GET'])]
    public function getEmployees(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/EmployeeController.php',
        ]);
    }

    #[Route('/employees/{id}',
        name: 'get employee by id',
        methods: ['GET'])]
    public function getEmployeeById($id): JsonResponse
    {
        return $this->json([
            'message' => $id,
            'path' => 'src/Controller/EmployeeController.php',
        ]);
    }
}
