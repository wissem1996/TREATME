<?php

namespace App\Controller;

use App\Entity\Oxygene;
use App\Entity\OxygenSupplier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OxygenController extends AbstractController
{
    /**
     * @Route("/oxygen", name="oxygen")
     */
    public function index(): Response
    {
        return $this->render('oxygen/index.html.twig', [
            'controller_name' => 'OxygenController',
        ]);
    }

    /**
     * @Route("oxygen/all", name="get_all_oxygen", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $oxygen = $this->getDoctrine()->getRepository(Oxygene::class)->findAll();

        foreach ($oxygen as $ox) {
            $data[] = [
                'id' => $ox->getId(),
                'supplier' => $ox->getSupplier()->getName(),
                'waterCapacity' => $ox->getWaterCapcity(),
                'oxygenCapacity' => $ox->getOxygeneCapacity(),
                'status' => $ox->getStatus(),
                'price' => $ox->getPrice(),
                'image' => $ox->getImage()
            ];
        }
        $response = new JsonResponse($data, Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("oxygen/{id}", name="get_oxygen_by_id", methods={"GET"})
     */
    public function getOxygenById($id): JsonResponse
    {
        $oxygen = $this->getDoctrine()->getRepository(Oxygene::class)->findOneBy(['id' => $id]);
            $data = [
                'id' => $oxygen->getId(),
                'supplier' => $oxygen->getSupplier()->getId(),
                'waterCapacity' => $oxygen->getWaterCapcity(),
                'oxygenCapacity' => $oxygen->getOxygeneCapacity(),
                'status' => $oxygen->getStatus(),
                'price' => $oxygen->getPrice(),
                'image' => $oxygen->getImage()
            ];
        $response = new JsonResponse($data, Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/oxygen/new", name="insert_new_oxygen", methods={"POST"})
     */
    public function insert(Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $oxygen = new Oxygene();

        $supplier = $em->getRepository(OxygenSupplier::class)->find($data['supplierId']);
        $waterCapacity = $data['waterCapacity'];
        $oxygenCapacity = $data['oxygenCapacity'];
        $price = $data['price'];

        $oxygen->setSupplier($supplier);
        $oxygen->setWaterCapcity($waterCapacity);
        $oxygen->setOxygeneCapacity($oxygenCapacity);
        $oxygen->setPrice($price);
        $oxygen->setStatus('Available');

        $em->persist($oxygen);
        $em->flush();
        $oxygenId = $oxygen->getId();
        $response = new JsonResponse(['id' => $oxygenId], Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/oxygen/update/{id}", name="update_oxygen", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $oxygen = $em->getRepository(Oxygene::class)->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        $supplier = $em->getRepository(OxygenSupplier::class)->find($data['supplierId']);
        $waterCapacity = $data['waterCapacity'];
        $oxygenCapacity = $data['oxygenCapacity'];
        $price = $data['price'];

        $oxygen->setSupplier($supplier);
        $oxygen->setWaterCapcity($waterCapacity);
        $oxygen->setOxygeneCapacity($oxygenCapacity);
        $oxygen->setPrice($price);

        $em->persist($oxygen);
        $em->flush();
        $response = new JsonResponse($data, Response::HTTP_OK);
        return $response;
    }

    /**
     * @Route("/oxygen/delete/{id}", name="delete_oxygen", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $oxygen = $em->getRepository(Oxygene::class)->findOneBy(['id' => $id]);

        $em->remove($oxygen);
        $em->flush();

        $response = new JsonResponse(['status' => 'Oxygen deleted'], Response::HTTP_NO_CONTENT);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/oxygen/upload", name="upload_oxygen_img", methods={"POST"})
     */
    public function upload(Request $request): JsonResponse
    {
        /** @var UploadedFile $uploadedImage */
        $uploadedImage = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $em = $this->getDoctrine()->getManager();
        $oxygen = $em->getRepository(Oxygene::class)->findOneBy(['id' => $request->get('id')]);
        $oxygen->setImage("http://localhost:8000/uploads/" . $request->get('id') . ".png");

        $em->persist($oxygen);
        $em->flush();
        dd($uploadedImage->move($destination, $request->get('id') . ".png"));
        $response = new JsonResponse(['status' =>  "Image uploaded"], Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

}
