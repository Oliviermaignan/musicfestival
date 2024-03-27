<?php
      // lors de la mise en open source, remplacer les infos concernant la base de données.
      
      define('DB_HOST', 'localhost');
      define('DB_NAME', 'festival');
      define('DB_USER', 'festival');
      define('DB_PWD', 'festival');
      
      // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
      // exemple: /mon-site/public/
      define('HOME_URL', '/');
      
      // initialisation de la variable pour créer la Db a TRUE
      define('DB_INITIALIZED', TRUE);