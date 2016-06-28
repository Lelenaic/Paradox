<?php
define('_VERSION_','V.alpha-1.0a'); //Version de Paradox
define('_NOM_','Paradox'); //Nom de l'application
define('_URL_','http(s)://url_de_paradox.extension/');
define('_MAIL_','mail_envoi');
define('_MAILHOST_','serveur_mail_smtp');
define('_MAILLOGIN_','nom_utilisateur_serveur_mail');
define('_MAILPASS_','mot_de_passe_serveur_mail');
define('_MAILPORT_',port_serveur_mail); //Paradox se connectera en TLS au serveur par défaut (conseillé), si vous souhaitez changer, modifiez dans (admin/class/Mail.php:82)
define('_BDDHOST_','hote_serveur_MySql');
define('_BDDNAME_','nom_base_mysql');
define('_BDDUSER_','utilisateur_mysql');
define('_BDDPASS_','mot_de_passe_mysql');
define('_PARTITION_','/var'); //Dossier à surveiller (espace disque). Paradox affichera l'espace disque disponible de la partition (admin)
