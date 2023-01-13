<?php

namespace App\Controller;

use App\Entity\Employee;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employee')]
class EmployeeController extends AbstractController
{
    #[Route('/', name: 'app_employee')]
    public function index(): Response
    {
        return $this->render('employee/index.html.twig', [
            'controller_name' => 'EmployeeController',
        ]);
    }

    #[Route('/ajout', name: 'app_employee_ajout')]
    public function addEmployee(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $employee = new Employee();
        $employee2 = new Employee();
        $employee->setFirstName('Bouziane');
        $employee->setLastName('Helaili');
        $employee->setAge('46');
        $employee2->setFirstName('Bouziane');
        $employee2->setLastName('Helaili');
        $employee2->setAge('46');

        $entityManager->persist($employee);
        $entityManager->persist($employee2);
        $entityManager->flush();

        return $this->render('employee/detail.html.twig', [
            'employee' => $employee,
        ]);
    }
}
