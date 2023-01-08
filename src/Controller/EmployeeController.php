<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/employees/{id}', name: 'get employee', methods: ['GET'])]
    public function index($id): JsonResponse
    {
        $user = $this->security->getUser();

        if ($user == null
            || $id != $user->getEmployee()->getId()) {
            return $this->json([
                'message' => 'not authorized to access this employee details',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $employee = $user->getEmployee();
        return $this->json([
            'id' => $employee->getId(),
            'firstName' => $employee->getFirstName(),
            'lastName' => $employee->getLastName(),
            'address' => $employee->getAddress(),
        ], Response::HTTP_OK);


    }

}
