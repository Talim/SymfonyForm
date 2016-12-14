<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Employe;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LectureCtrlController extends Controller
{
    /**
     * @Route(
     *     "/index",
     *     name="lectureCtrl_index"
     * )
     */
    public function indexAction()
    {
        return $this->render('AppBundle:LectureCtrl:index.html.twig');
    }


    /**
     * @Route("/afficheEmpParam",
     *     name="appBundle_afficheEmpParam"
     * )
     */
    public function afficheEmpParamAction() {
        $employe = new Employe(1, "Dupont", "Jean", new \DateTime('1988-12-25'));
        $formulaire = $this->createFormBuilder($employe)
            ->add('num', NumberType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaissance', DateType::class)
            ->add('Enregistrer', SubmitType::class)
            ->getForm();
        $sport = 'Rugby';
        $autos = array('Ferrari', 'Aston Martin', 'Porsche');
        return $this->render('AppBundle:LectureCtrl:afficheEmpParam.html.twig', array(
            'leFormulaire' => $formulaire->createView(),
            'sport' => $sport,
            'autos' => $autos
            ));
    }

    /**
     * @Route("/afficheEmpTwig",
     *     name="appBundle_afficheEmpTwig"
     * )
     */
    public function afficheEmpTwigAction() {
        $employe = new Employe(1, "Dupont", "Jean", new \DateTime('1988-12-25'));
        $employe->setPrenom("Jean");
        $employe->setDateNaissance(new \DateTime('today'));

        $formulaire = $this->createFormBuilder($employe)
            ->add('num', NumberType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaissance', DateType::class)
            ->add('Enregistrer', SubmitType::class)
            ->getForm();

        return $this->render('AppBundle:LectureCtrl:afficheEmpTwig.html.twig', array(
            'uneEntree' => 'je viens du controller',
            'leFormulaire' => $formulaire->createView()
        ));
    }

    /**
     * @Route("/afficheEmpTwigCss",
     *     name="appBundle_afficheEmpTwigCss"
     * )
     */
    public function afficheEmpTwigCssAction() {
        $employe = new Employe(1, "Dupont", "Jean", new \DateTime('1988-12-25'));
        $employe->setPrenom("Jean");
        $employe->setDateNaissance(new \DateTime('today'));

        $formulaire = $this->createFormBuilder($employe)
            ->add('num', NumberType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaissance', DateType::class)
            ->add('Enregistrer', SubmitType::class)
            ->getForm();

        return $this->render('AppBundle:LectureCtrl:afficheEmpTwigCss.html.twig', array(
            'uneEntree' => 'je viens du controller',
            'leFormulaire' => $formulaire->createView()
        ));
    }

}
