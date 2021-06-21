# Resume

Le client souhaite disposer d'une application qui lui permet de saisir en avance un planning sur une journée.
Il veut pouvoir administrer les activités de la journée. Il indique également que ces activités peuvent changer. 
L'application sera à l'usage de personnes qui disposent de plannings communs ou différents selon les cas.

# Backlog

En tant que|Je veux|Afin de|Taches|Priorite
:---|:---|:---|:---|:---
Utilisateur|Créer, modifier, desactiver une activité|Gérer les activités possibles|Modele de la table Activite
||||CRUD sur la table
||||Sécuriser le formulaire
Utilisateur|Créer, modifier, desactiver un utilisateur|Gérer les utilsateurs|Modele de la table utilisateur
||||CRUD sur la table
||||Sécuriser le formulaire
Utilisateur|Affecter une activité à une personne|Visualiser les activités sur une date|Fonction d'ajout de l'id de l'activité à une heure et date


# MCD

![sparkles](ressources/documentation/MCD-V3.png)

# MPD

roles: id, libelle;
utilisateurs: id, nom, prenom, #role_id;
posseder: id, #id_utilisateur, #id_activites, libelle, jour;
activites: id, libelle, debut, fin, etat;

# Wireframes

## Roles

![sparkles](ressources/documentation/wireframe_roles.png)

## Utilisateurs

![sparkles](ressources/documentation/wireframe_users.png)

## Activites

![sparkles](ressources/documentation/wireframe_activites.png)

## Affectations

![sparkles](ressources/documentation/wireframe_affectation.png)


