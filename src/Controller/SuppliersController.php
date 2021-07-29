<?php

namespace App\Controller;

use App\Entity\Oxygene;
use App\Entity\OxygenSupplier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuppliersController extends AbstractController
{
    /**
     * @Route("/suppliers", name="suppliers")
     */
    public function index(): Response
    {
        return $this->render('suppliers/index.html.twig', [
            'controller_name' => 'SuppliersController',
        ]);
    }

    /**
     * @Route("/suppliers/all", name="get_all_suppliers", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $suppliers = $this->getDoctrine()->getRepository(OxygenSupplier::class)->findAll();
        $data = [];

        foreach ($suppliers as $supplier) {
            $data[] = [
                'id' => $supplier->getId(),
                'supplierName' => $supplier->getName(),
                'contact' => $supplier->getContact(),
                'location' => $supplier->getLocation()
            ];
        }
        $response = new JsonResponse($data, Response::HTTP_OK);
        return $response;
    }

    /**
     * @Route("suppliers/{id}/oxygen", name="get_oxygen_by_supplier", methods={"GET"})
     */
    public function getOxygenBySupplier($id): JsonResponse
    {
        $oxygen = $this->getDoctrine()->getRepository(Oxygene::class)->findBy(array('supplier' => $id, 'status' => 'Available'));
        $data = [];

        foreach ($oxygen as $ox) {
            $data[] = [
                'id' => $ox->getId(),
                'waterCapacity' => $ox->getWaterCapcity(),
                'oxygeneCapacity' => $ox->getOxygeneCapacity(),
                'status' => $ox->getStatus(),
                'price' => $ox->getPrice()
            ];
        }
        $response = new JsonResponse($data, Response::HTTP_OK);
        return $response;
    }
}
