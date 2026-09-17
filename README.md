# Site LN - Dessine Moi Un Mouton

Portfolio en ligne d'**Hélène Languerand**, illustratrice spécialisée avec appétence en visuels **FALC** (Facile à Lire et à Comprendre).

---

## Pages

| Page | Description |
|------|-------------|
| `index.html` | Accueil |
| `portfolio.html` | Portfolio FALC - illustrations par projet |
| `illustrations.html` | Illustrations générales |
| `apropos.html` | Présentation & démarche |
| `contact.html` | Formulaire de contact |

## Stack

- HTML / CSS / JavaScript vanilla - aucune dépendance, aucun framework
- PHP (`send.php`) - envoi du formulaire de contact côté serveur, sans service tiers
- Google Fonts - Fredoka One + Nunito

## Structure

```
/
├── index.html
├── portfolio.html
├── illustrations.html
├── apropos.html
├── contact.html
├── style.css
├── nav.js
├── send.php
└── images/
    ├── FALC/
        └── ...
    └── Illustrations/ 
        └── ...
    ...
```

## Fonctionnalités

- Lightbox par projet (navigation clavier ← → + Échap)
- Menu responsive (burger mobile)
- Animations au scroll (`IntersectionObserver`)
- Formulaire de contact PHP natif (zéro dépendance externe)

## Déploiement

A REALISER

