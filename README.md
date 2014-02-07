xmas - Ett PHP-baserat Ramverk

Ramverket är skapat av Madeleine Lindberg och är ett studentprojekt i kursen "Databasdrivna webbapplikationer med PHP och MVC" vid Blekinge Tekniska Högskola. 
xmas är baserat på ramverket Lydia som är skapat av Mikael Roos, lärare i kurspaketet Databaser, HTML, CSS, JavaScript och PHP.

Specifikation

    PHP
    SQLite
    Skrivbar katalog site/data (chmod 777)
    Databasen ht.sqlite ska vara skrivbar (chmod 666) för att fungera
    
Installation

    Klona ramverket från github git clone https://github.com/madnezdesign/xmas eller ladda ner det som en zip-fil och lägg filerna på en lämplig plats i din dator. Öppna ramverket med cd xmas i Git Bash.

    Innan du laddar upp ramverket på studentservern behöver du öppna .htaccess-filen och skriva in sökvägen till den platsen du tänker installera ramverket. Ändra i RewriteBase RewriteBase /~mals13/phpmvc/kmom08/mad/.

    För att ramverket ska fungera behöver du göra katalogerna site och data skrivbar. Du gör dem skrivbar med chmod 777: chmod 777 site/data och databasfilen måste du göra skrivbar med chmod 666. När det är färdigt gör du katalogen themes/grid skrivbar på samma sätt, chmod 777 themes/grid. Om det inte fungerar som det ska kan du göra katalogerna skrivbara i studentservern. 
    Högerklicka på katalogerna, välj filrättigheter och skriv 777.

    Öppna ramverket i din webbläsare www.yourdomain.com/xmas/ och lägg till module/install i sökvägen. Tryck på enter för att slutföra installationen.
