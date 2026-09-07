<?php
// ══════════════════════════════════════════════
//  ✏️  MODIFIE UNIQUEMENT CETTE LIGNE
// ══════════════════════════════════════════════
$destinataire = 'tonemail@exemple.fr';
// ══════════════════════════════════════════════

header('Content-Type: application/json');

// Refuser les requêtes qui ne viennent pas du formulaire
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false]);
    exit;
}

// Récupération et nettoyage des champs
function nettoyer($str) {
    return htmlspecialchars(strip_tags(trim($str)), ENT_QUOTES, 'UTF-8');
}

$prenom       = nettoyer($_POST['prenom']       ?? '');
$nom          = nettoyer($_POST['nom']          ?? '');
$organisation = nettoyer($_POST['organisation'] ?? '');
$email        = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$sujet        = nettoyer($_POST['sujet']        ?? '');
$message      = nettoyer($_POST['message']      ?? '');

// Vérifications minimales
if (empty($prenom) || empty($nom) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Champs manquants ou invalides']);
    exit;
}

// Construction du mail
$objet = "Nouveau contact studioFALC — $prenom $nom";

$corps  = "Nouveau message reçu via le formulaire de contact.\n\n";
$corps .= "────────────────────────\n";
$corps .= "Prénom       : $prenom\n";
$corps .= "Nom          : $nom\n";
$corps .= "Email        : $email\n";
if ($organisation) {
$corps .= "Organisation : $organisation\n";
}
if ($sujet) {
$corps .= "Type projet  : $sujet\n";
}
$corps .= "────────────────────────\n\n";
$corps .= "Message :\n$message\n";

// En-têtes mail
$headers  = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Envoi
$envoi = mail($destinataire, $objet, $corps, $headers);

echo json_encode(['success' => $envoi]);
