<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Participante;
use AppBundle\Entity\Evento;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

  public  function actividades_eventoAction(){
      $em = $this->getDoctrine()->getManager();
      $actividades = $em->getRepository('AppBundle:Actividad')->findAll();
      return $this->render('participante/verfiestas.html.twig', array(
          'actividades' => $actividades,
      ));
    }
  public  function showEventosAction(Request $request){
      $idevento = $request->get("id");
      $eventos = $this->getDoctrine()->getManager()->getRepository('AppBundle:Evento')->findByIdactividad($idevento);
      return $this->render('default/verEventos.html.twig', array(
                    'eventos' => $eventos,
        ));
    }
    public  function participarAction(Request $request){
        $idActividad = $request->get("id");
        $participantes = $this->getDoctrine()->getManager()->getRepository('AppBundle:Participante')->findAll();
        return $this->render('default/partipar.html.twig', array(
                      'idActividad' => $idActividad, 'participantes'=>$participantes,
          ));
      }

      public  function newParticipanteAction(Request $request){
          $idParticipante = $request->get("idParticipante");
          $idActividad= $request->get("idActividad");//Esto es el evento no he cambiado el nombre
          $usr= "C6PC10\SQLEXPRESS";
          $db=array("Database"=>"Ayuntamiento", "CharacterSet"=>"UTF-8");
          $con=sqlsrv_connect($usr, $db);
          if(!$con){
            die(print_r(sqlsrv_errors(), true));
          }
          $sql="insert into Participa (idEvento, idParticipante) values (".$idActividad .",".$idParticipante.");";
          $stmt=sqlsrv_query($con, $sql);
          if(!$stmt){
            //sqlsrv_free_stmt($stmt);
          //  sqlsrv_close($con);
            return $this->render('default/errorParticipa.html.twig');
          }
        //  sqlsrv_free_stmt($stmt);
        //  sqlsrv_close($con);
            return $this->render('default/partipaExito.html.twig');
        }

        public function identificateAction(){
          $em = $this->getDoctrine()->getManager();
          $politicos = $em->getRepository('AppBundle:Autoridad')->findAll();
          return $this->render('default/verPoliticos.html.twig', array(
              'politicos' => $politicos,
          ));
        }

        public function addEventoPoliticoAction(Request $request){
          $idpolitico= $request->get("idpolitico");
          $patrocinadores=$this->getDoctrine()->getManager()->getRepository('AppBundle:Autoridad')->findAll();
           return $this->render('default/formularioEvento.html.twig', array(
               'idpolitico' => $idpolitico, 'patrocinadores'=>$patrocinadores,
           ));
        }
          public function addEventoPoliticoByAction(Request $req){
            $nombreEvento= $req->get("nombreEvento");
            $descripcionEvento = $req->get("descripcionEvento");
            $fechaEvento= $req->get("fechaEvento");
            $lugarEvento= $req->get("lugarEvento");
            $temporadaEvento= $req->get("temporadaEvento");
            $patrocinadorEvento=$req->get("patrocinadorEvento");
            $idpolitico = $req->get("idpolitico");
            $evento = new Evento();
            $evento->setNombre($nombreEvento);
            $evento->setDescripcion($descripcionEvento);
            $evento->setFyh($fechaEvento);
            $evento->setLugar($lugarEvento);
            $evento->setIdconceorganiza($idpolitico);
            $evento->setIdactividad($patrocinadorEvento);
            $evento->setIdpatrocina($patrocinadorEvento);

            $em = $this->getDoctrine()->getManager();
            $em->persist($evento);
            $em->flush($evento);

            return $this->redirectToRoute('participar_ciudadano');
          }
}
