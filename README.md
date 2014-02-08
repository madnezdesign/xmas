xmas - Ett PHP-baserat Ramverk

Ramverket är skapat av Madeleine Lindberg och är ett studentprojekt i kursen "Databasdrivna webbapplikationer med PHP och MVC" vid Blekinge Tekniska Högskola. 
xmas är baserat på ramverket Lydia som är skapat av Mikael Roos, lärare i kurspaketet Databaser, HTML, CSS, JavaScript och PHP.

Specifikation

    PHP
    SQLite
    Skrivbar katalog site/data (chmod 777)
    Databasen ht.sqlite ska vara skrivbar (chmod 666) för att fungera
    
Installation

    Klona ramverket från github git clone https://github.com/madnezdesign/xmas eller ladda ner det som en zip-fil 
    och lägg filerna på en lämplig plats i din dator. Öppna ramverket med cd xmas i Git Bash. 
    
    Innan du laddar upp ramverket på studentservern behöver du öppna .htaccess-filen och skriva 
    in sökvägen till den platsen du tänker installera ramverket. 
    Ändra i RewriteBase RewriteBase /~mals13/phpmvc/kmom08/mad/.

    För att ramverket ska fungera behöver du göra katalogerna site och data skrivbar. Du gör dem skrivbar med chmod 777:
    chmod 777 site/data och databasfilen måste du göra skrivbar med chmod 666. När det är färdigt gör du katalogen
    themes/grid skrivbar på samma sätt, chmod 777 themes/grid. Om det inte fungerar som det ska kan du göra katalogerna
    skrivbara i studentservern. Högerklicka på katalogerna, välj filrättigheter och skriv 777.

    Öppna ramverket i din webbläsare www.yourdomain.com/xmas/ och lägg till module/install i sökvägen. 
    Tryck på enter för att slutföra installationen.

Användning

    Efter installationen av ramverket kan du logga in via webbläsaren antingen som:
    Användarnamn: root Lösenord: root eller Användarnamn: doe Lösenord: doe
    Med inloggningen root som har administratör behörighet har du tillgång till alla grupper, användare och innehåll.
     
     Du kan lägga till, uppdatera och ta bort dessa och välja vem som kan se ett visst innehåll. 
     Du har också tillgång till modulerna som finns i högerspalten. Dessa moduler innehåller information 
     om de filer som finns installerade i ramverket.
     Du kan även skapa en ny användare under create user. 
     
     För att skapa en blogg eller en sida i ramverket måste du vara inloggad som en användare, när du är inloggad
     klickar du på content/create och fyller i fälten som finns. Titel är bloggen/sidans titel, Key är nyckelord,
     Content är bloggen/sidans innehåll. Om du vill skapa ett blogginlägg skriver du post i Type, om det är en statisk
     sida som du vill skapa skriver du page i Type. Filter är olika sätt att formatera texten, 
     ett tips är att använda sig av plain när man vill lägga till ett nytt innehåll. 
     
För att ändra namnen i Navigeringsmenyn går du in i mappen site och öppnar filen config i ditt redigerings program.
Skriv in det nya namnet efter 'label'=>

    $ml->config['menus'] = array(
    'navbar' => array(
    'home'      => array('label'=>'Home',       'url'=>'home'),
    'modules'   => array('label'=>'Modules',    'url'=>'module'),
    'content'   => array('label'=>'Content',    'url'=>'content'),
    'home'      => array('label'=>'About Me',    'url'=>'my/index'),
    'blog'      => array('label'=>'My Blog',     'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook',   'url'=>'my/guestbook'),
    
    
Redigera Style och Logga

I mappen site och i filen congig.php ligger alla grundinställningarna för layouten.
Vill du ändra logga, navigeringsmenyn och slogan samt footer texten kan du göra det här: Skrolla ner till rad 172,
eller tills du finner denna kodtexten:

    'region_to_menu' => array('site-menu'=>'my-navbar', 'navbar'=>'navbar'),
    'data' => array(
    'header'      => 'MAD',
    'slogan'      => 'A PHP-based MVC-inspired CMF',
    'favicon'     => 'favicon.ico',
    'logo'        => 'header.png',
    'logo_width'  => 200,
    'logo_height' => 200,
    'footer'      => '<p>Mad &copy; by Madeleine Lindberg</p>',
      ),
      
För att ändra den stora header texten till något annat skriver du in den önskade texten efter 'header'=>'skriv text här'
För att ändra slogan, den mindre texten i bannern byter du ut texten efter 'slogan'=>'text här'
Vill du ha en annan bild skriver du in bild namnet och rätt sökväg i 'logo'=>'bild.jpg'

I detta fallet är header.png bilden samt favicon.ico bilden i mappen site/themes/mytheme
ha gärna bilderna du väljet att använda som header och favicon i samma mapp.

Välj även rätt storlek på bilden, width är bredd och height är höjd, i detta fallet står 200 respektive 200 inskrivet.
Till sist kan du ändra till den text du vill ska stå skrivet längst ner på sidan i footern och det gör du efter
'footer'=>'skriv text här'

När du ska ändra i stylesheeten ska du in i mappen themes/grid och öppna filen style.css och här kan du egentligen
redigera efter eget behov. 

    För att ändra rubrik fonterna letar du upp h1 och h2, 
    ändra storlek: font-size:  
    ändra färg: color: eller font-color:
    
Vill du ändra bakgrundsfärgen/bilden letar du upp body (rad 52) och kan välja följande beroende på hur du vill ha det:

    backround-color:    detta ger en bakgrundsfärg;
    background-image:   sökväg/bild.jpg;
     - eller -
    background:         färg och/eller sökväg/bild.jpg;
     - ändra fonten -
     font:              välj önskad font och storlek;
     
För att ändra lite med utseendet i footern går du ner till #footer (rad 230) och kan ändra font storlek, färg och annat:

    Font storleken ändrar du i  font-size: ;
    Font färgen ändrar du i     color: ;
    
    För att ändra bakgrundsfärgen i footern letar du upp #outer-wrap-footer (rad 219):
    
    background: önskad färg;
    
Om du vill ändra ramverkets navigeringsmeny måste du ta dig till site/themes/mythemes/style.css

    #navbar (rad 32) är själva menyn som du ser den, anpassa efter eget behov med bakgrundsfärg för att passa
    din hemsida eller/och bordern som är runt om menyn.
