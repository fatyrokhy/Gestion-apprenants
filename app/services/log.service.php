<?php  
require_once(PATH."/app/model/modelUser.php");
function login($seConnecter)
    {
        $errors = [];
        if (isset($_POST["add"])) {
            isEmpty('email', $errors);
            isEmpty('pass', $errors);
            $utilisateur = $seConnecter($_POST["email"], $_POST["pass"]);
            if ($utilisateur) {
                switch ($utilisateur['role']) {
                    case 'ADMIN':
                        $_SESSION['user'] = $utilisateur;
                        // $user=getUser();
                            redirection('promo','dashboard');
                        break;
                    case 'responsable':
                        $_SESSION['user'] = $utilisateur;
                        redirection('rpController','dashboardRp');
                        break;
                        case 'attache':
                            $_SESSION['user'] = $utilisateur;
                            redirection('inscrit','listeInscrits');
                            break;
                    default:
                        $errors['global'] ="Vous n'avez pas le rôle requis pour accéder à cette page.";
                        break;
                }
            } else {
                $errors['global'] = "Email ou mot de passe incorrect.";
            }
        }
        require_once(PATH."/app/views/authentification/connexion.php");
    }
