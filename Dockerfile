FROM wordpress:latest
 
# Installer Git
RUN apt-get update && apt-get install -y git && rm -rf /var/lib/apt/lists/*
 
# Cloner le dépôt dans un dossier temporaire
RUN git clone https://github.com/luz-caballero/izzycook /tmp/izzycook
 
# Nettoyer les fichiers WordPress par défaut
RUN rm -rf /var/www/html/*
 
# Copier le contenu du dépôt dans le dossier WordPress
RUN cp -r /tmp/izzycook/* /var/www/html/
 
# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html/
 
EXPOSE 80