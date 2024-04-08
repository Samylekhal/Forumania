<?php 

namespace App\Controller;

use App\Form\ForminscriptionType;
use App\Form\FormconnexionType;
use App\Entity\Inscrit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PagesController extends AbstractController 
{
    #[Route('/Inscription', name: 'Inscription')]
    public function Inscription(Request $request , EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $inscrit = new Inscrit();
        $form = $this->createForm(ForminscriptionType::class, $inscrit);
        $form->handleRequest($request); // Traitez les données du formulaire
        $existingUser = $entityManager->getRepository(Inscrit::class)->findOneBy(['Pseudo' => $inscrit->getPseudo()]);

        if ($form->isSubmitted() && $form->isValid()) {
            // vérifie sur le pseudo et le mot de passe n'existe pas déja
            if ($existingUser){
                $this->addFlash('error', 'Le pseudo est déjà utilisé. Veuillez en choisir un autre.');
                return $this->render('Pages/Inscription.html.twig', [
                    'form' => $form->createView()
                ]);
            }
            $inscrit->setDateArrivee(new \DateTime('now')); // Définir la date d'arrivée de l'utilisateur
            $entityManager->persist($inscrit);
            $entityManager->flush();

    
            return $this->redirectToRoute('Connexion'); // Redirigez vers la page de connexion après l'inscription
        }
        return $this->render('Pages/Inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/Connexion', name: 'Connexion')]
    public function Connexion(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $form = $this->createForm(FormconnexionType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $pseudo = $form->get('Pseudo')->getData();
            $mdp = $form->get('mdp')->getData();
            $inscrit = $entityManager->getRepository(Inscrit::class)->findOneBy(['Pseudo' => $pseudo, 'mdp' => $mdp]);
    
            if ($inscrit) {
                // Créez une nouvelle session pour l'utilisateur
                $session->set('user', $inscrit);
    
                return $this->redirectToRoute('PagePrincipal'); // Redirigez vers la page principale après la connexion
            } else {
                $this->addFlash('error', 'Identifiant ou mot de passe invalide');
            }
        }
        return $this->render('Pages/Connexion.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/PagePrincipal', name: 'PagePrincipal')]
    public function PagePrincipal(SessionInterface $session): Response
    {
        // Récupérez l'utilisateur de la session
        $inscrit = $session->get('user');
    
        // Vérifiez si l'utilisateur est connecté
        if ($inscrit) {
            // Affichez le pseudo de l'utilisateur connecté
            $pseudo = $inscrit->getPseudo();
        } else {
            // Si l'utilisateur n'est pas connecté, définissez $pseudo à null
            $pseudo = null;
        }
    
        return $this->render('Pages/PagePrincipal.html.twig', [
            'pseudo' => $pseudo
        ]);
    }
    #[Route('/Profil', name: 'Profil')]
    public function Profil(SessionInterface $session): Response
    {
        // Récupérez l'utilisateur de la session
        $inscrit = $session->get('user');
        if ($inscrit) {
            $pseudo = $inscrit->getPseudo();
        } else {
            $pseudo = null;
        }
        return $this->render('Pages/Profil.html.twig',[
            'pseudo' => $pseudo]);
    }
}

?>