<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login')]
    public function index(#[CurrentUser] ?User $user): JsonResponse
    {
        if (null === $user) {
            return $this->json([
                'message' => 'Invalid credentials provided.',
            ], Response::HTTP_UNAUTHORIZED);
        }
        $employeeId = $user->getEmployee()->getFirstName();
        return $this->json([
            'id' => $user->getId(),
            'username'=> $user->getUsername(),
            'employeeId' => $employeeId,
        ]);
    }
}
