<?php

namespace App\Controller;

use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientsController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function index(): Response
    {
        return $this->render('patients/index.html.twig', [
            'controller_name' => 'PatientsController',
        ]);
    }

    /**
     * @Route("/patients/all", name="get_all_patients", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $patients = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        $data = [];

        foreach ($patients as $patient) {
            $data[] = [
                'id' => $patient->getId(),
                'patientName' => $patient->getPatientName(),
                'gender' => $patient->getGender(),
                'dateOfBirth' => $patient->getDateOfBirth(),
                'bloodGroup' => $patient->getBloodGroup(),
                'mobileNumber' => $patient->getMobileNumber(),
                'email' => $patient->getEmail()
            ];
        }
        $response = new JsonResponse($data, Response::HTTP_OK);
        return $response;
    }
}
