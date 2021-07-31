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
     * @Route("/payment/{id}", name="get_payment_by_id", methods={"GET"})
     */
    public function getPaymentById($id): JsonResponse
    {
        $payment = $this->getDoctrine()->getRepository(Payments::class)->findOneBy(['id' => $id]);
            $data = [
                'id' => $payment->getId(),
                'patient' => $payment->getPatient()->getId(),
                'supplier' => $payment->getSupplier()->getId(),
                'oxygen' => $payment->getOxygen()->getId(),
                'date' => $payment->getCreatedAt()->format('d/m/Y'),
                'price' => $payment->getPrice(),
                'tax' => $payment->getTax(),
                'total' => $payment->getTotal()
            ];
        $response = new JsonResponse($data, Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/payments/all", name="get_all_payments", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $payments = $this->getDoctrine()->getRepository(Payments::class)->findAll();

        foreach ($payments as $payment) {
            $data[] = [
                'id' => $payment->getId(),
                'patient' => $payment->getPatient()->getPatientName(),
                'supplier' => $payment->getSupplier()->getName(),
                'oxygen' => $payment->getOxygen()->getId(),
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
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/payment/update/{id}", name="update_payment", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $payment = $em->getRepository(Payments::class)->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);
        $patient = $em->getRepository(Patient::class)->find($data['patientId']);

        $payment->setPatient($patient);
        $payment->setPrice($data['price']);
        $payment->setTax($data['tax']);
        $payment->setTotal($data['total']);

        if ($data['oxygenId'] !== null) {
            $supplier = $em->getRepository(OxygenSupplier::class)->find($data['supplierId']);
            $payment->setSupplier($supplier);

            $oldOxygen = $em->getRepository(Oxygene::class)->find($payment->getOxygen()->getId());
            $oldOxygen->setStatus('Available');
            $em->persist($oldOxygen);
            $em->flush();

            $oxygen = $em->getRepository(Oxygene::class)->find($data['oxygenId']);
            $oxygen->setStatus('Sold');
            $em->persist($oxygen);
            $em->flush();

            $payment->setOxygen($oxygen);

        }

        $em->persist($payment);
        $em->flush();

        $response = new JsonResponse($data, Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/payments/delete/{id}", name="delete_payment", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $payment = $em->getRepository(Payments::class)->findOneBy(['id' => $id]);

        $oxygen = $payment->getOxygen();
        $oxygen->setStatus('Available');

        $em->remove($payment);
        $em->persist($oxygen);
        $em->flush();

        $response = new JsonResponse(['status' => 'Payment deleted'], Response::HTTP_NO_CONTENT);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
