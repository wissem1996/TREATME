<?php

namespace App\Controller;

use App\Entity\Oxygene;
use App\Entity\OxygenSupplier;
use App\Entity\Patient;
use App\Entity\Payments;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class PaymentsController extends AbstractController
{
    /**
     * @Route("/payments", name="payments")
     */
    public function index(): Response
    {
        return $this->render('payments/index.html.twig', [
            'controller_name' => 'PaymentsController',
        ]);
    }

    /**
     * @Route("/payments/all", name="get_all_payments", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $payments = $this->getDoctrine()->getRepository(Payments::class)->findAll();
        $data = [];

        foreach ($payments as $payment) {
            $data[] = [
                'id' => $payment->getId(),
                'patient' => $payment->getPatient()->getPatientName(),
                'supplier' => $payment->getSupplier()->getName(),
                'oxygen' => $payment->getOxygen()->getID(),
                'date' => $payment->getCreatedAt()->format('d/m/Y'),
                'price' => $payment->getPrice(),
                'tax' => $payment->getTax(),
                'total' => $payment->getTotal()
            ];
        }
        $response = new JsonResponse($data, Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/payments/new", name="insert_new_payment", methods={"POST"})
     */
    public function insert(Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $payment = new Payments();

        $patient = $em->getRepository(Patient::class)->find($data['patientId']);
        $supplier = $em->getRepository(OxygenSupplier::class)->find($data['supplierId']);
        $oxygen = $em->getRepository(Oxygene::class)->find($data['oxygenId']);
        $date = new \DateTime('now');
        $price = $data['price'];
        $tax = $data['tax'];
        $total = $data['total'];

        $payment->setPatient($patient);
        $payment->setSupplier($supplier);
        $payment->setOxygen($oxygen);
        $payment->setCreatedAt($date);
        $payment->setPrice($price);
        $payment->setTax($tax);
        $payment->setTotal($total);
        $em->persist($payment);
        $em->flush();

        $oxygen->setStatus('Sold');
        $em->persist($oxygen);
        $em->flush();
        $response = new JsonResponse($data, Response::HTTP_OK);
        return $response;
    }
}
