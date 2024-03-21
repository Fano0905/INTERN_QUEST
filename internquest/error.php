<?php
/*
En cas d'erreur 419, vérifier dans l'ordre suivant:
    la présence de la ligne de commande "@csrf" dans votre formulaire, sinon quoi le rajouter juste après la balise <form>
    Vérifier la route de votre redirection
    Vérifier la méthode utilisée
    Vérifier votre request

Middleware:
    Les middleware, que nous utiliserons en premier lieu dans ce projet lors de l'authentification servira 
    par exemple à ne pas reconncter un utilisateur déjà connecté
     ou encore de sécuriser l'accès en fonction de l'état de la connexion d'un utilisateur
*/
