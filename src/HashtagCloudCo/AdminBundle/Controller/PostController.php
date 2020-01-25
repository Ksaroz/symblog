<?php


namespace HashtagCloudCo\AdminBundle\Controller;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function postAction() {

        $postrepo = $this->getDoctrine()->getRepository('HashtagCloudCoAdminBundle:Posts');
        $postdts = $postrepo->findAll();



//        if (!$postdts) {
//            throw $this->createNotFoundException(
//                'No product found'
//            );
//
//        }

            return $this->render('@HashtagCloudCoAdmin/Home/post.html.twig', array('viewPost' => $postdts));
        }

//        /**
//         *@Route("/post/delete/{id}")
//         * @method({"DELETE"})
//         */
        public function deleteAction(Request $request, $id) {

            $post = $this->getDoctrine()->getRepository('HashtagCloudCoAdminBundle:Posts')->find($id);

            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
//            $this->addFlash('message', 'Post Deleted Successfully');
//            return $this->redirectToRoute('Home_post');
            $response = new Response();
            $response->send();
        }


}